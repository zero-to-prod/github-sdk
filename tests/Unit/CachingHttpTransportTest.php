<?php

namespace Unit;

use Closure;
use PHPUnit\Framework\Attributes\Test;
use Tests\Fixtures\FixtureRoute;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\CachingHttpTransport;
use Zerotoprod\GitHubSdk\GitHubSdk;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;
use Zerotoprod\GitHubSdk\Internal\Fake;
use Zerotoprod\GitHubSdk\Response;

class CachingHttpTransportTest extends TestCase
{
    /**
     * A trivial in-memory cache closure that mirrors Laravel's
     * Cache::remember($key, $ttl, $fetch): runs the fetch once per key.
     *
     * @param  array<string, mixed>  $store
     *
     * @return Closure(string, Closure(): array<string, mixed>): array<string, mixed>
     */
    private function arrayCache(array &$store): Closure
    {
        return function (string $key, Closure $fetch) use (&$store): array {
            /** @var array<string, array<string, mixed>> $store */
            return $store[$key] ??= $fetch();
        };
    }

    #[Test]
    public function get_requests_hit_the_transport_only_once(): void
    {
        $store = [];
        $fake = new Fake();
        $fake->queue(new Response(200, ['X-Source' => 'origin'], 'first'));
        $fake->queue(new Response(200, [], 'second'));

        $caching = new CachingHttpTransport($fake, $this->arrayCache($store));

        $a = $caching->request('GET', 'https://api.example.com/v1/things');
        $b = $caching->request('GET', 'https://api.example.com/v1/things');

        $fake->assertSentCount(1);
        self::assertSame('first', $a->body);
        self::assertSame('first', $b->body);
        self::assertSame('origin', $b->header('X-Source'));
    }

    #[Test]
    public function distinct_urls_are_cached_separately(): void
    {
        $store = [];
        $fake = new Fake();
        $fake->queue(new Response(200, [], 'things'));
        $fake->queue(new Response(200, [], 'gadgets'));

        $caching = new CachingHttpTransport($fake, $this->arrayCache($store));

        $things  = $caching->request('GET', 'https://api.example.com/v1/things');
        $gadgets = $caching->request('GET', 'https://api.example.com/v1/gadgets');

        $fake->assertSentCount(2);
        self::assertSame('things', $things->body);
        self::assertSame('gadgets', $gadgets->body);
    }

    #[Test]
    public function non_get_requests_are_never_cached(): void
    {
        $store = [];
        $fake = new Fake();
        $fake->queue(new Response(201, [], 'created-1'));
        $fake->queue(new Response(201, [], 'created-2'));

        $caching = new CachingHttpTransport($fake, $this->arrayCache($store));

        $caching->request('POST', 'https://api.example.com/v1/things', ['json' => ['x' => 1]]);
        $caching->request('POST', 'https://api.example.com/v1/things', ['json' => ['x' => 1]]);

        $fake->assertSentCount(2);
        self::assertSame([], $store);
    }

    #[Test]
    public function the_cached_value_is_a_serializable_array(): void
    {
        $store = [];
        $fake = new Fake();
        $fake->queue(new Response(200, ['Content-Type' => 'application/json'], '{"ok":true}'));

        $caching = new CachingHttpTransport($fake, $this->arrayCache($store));
        $caching->request('GET', 'https://api.example.com/v1/things');

        self::assertCount(1, $store);
        $cached = reset($store);
        self::assertSame(
            ['status' => 200, 'headers' => ['Content-Type' => 'application/json'], 'body' => '{"ok":true}'],
            $cached,
        );
        // Round-trips through serialize() unchanged — what real cache drivers do.
        self::assertEquals($cached, unserialize(serialize($cached)));
    }

    #[Test]
    public function the_documented_in_memory_array_closure_serves_repeat_gets_from_memory(): void
    {
        // The exact dependency-free in-memory cache from the README / skill docs:
        // a plain array captured BY REFERENCE so writes persist across requests.
        $store = [];
        $cache = function (string $key, Closure $fetch) use (&$store): array {
            /** @var array<string, array<string, mixed>> $store */
            return $store[$key] ??= $fetch();
        };

        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['things' => [['name' => 'First']]]) ?: ''));

        $api = new GitHubSdk(
            [
                GitHubSdkConfig::url => 'https://api.example.com',
                GitHubSdkConfig::route_enum => FixtureRoute::class,
            ],
            new CachingHttpTransport($fake, $cache),
        );

        $first  = $api->listThings();
        $second = $api->listThings();

        // Only one HTTP request reached the transport — the second was memoized.
        $fake->assertSentCount(1);
        self::assertCount(1, $store);
        self::assertTrue($first->ok());
        self::assertSame('First', $first->data->things[0]->name);
        self::assertSame('First', $second->data->things[0]->name);
    }

    #[Test]
    public function an_arrow_fn_in_memory_closure_does_not_persist_writes(): void
    {
        // Guards the doc warning: arrow fns capture $store BY VALUE, so the
        // ??= write never reaches the outer array and nothing is ever cached.
        $store = [];
        $cache = fn(string $key, Closure $fetch): array => $store[$key] ??= $fetch();

        $fake = new Fake();
        $fake->queue(new Response(200, [], 'first'));
        $fake->queue(new Response(200, [], 'second'));

        $caching = new CachingHttpTransport($fake, $cache);

        $a = $caching->request('GET', 'https://api.example.com/v1/things');
        $b = $caching->request('GET', 'https://api.example.com/v1/things');

        // Both calls hit the transport, and the outer $store stays empty.
        $fake->assertSentCount(2);
        self::assertSame([], $store);
        self::assertSame('first', $a->body);
        self::assertSame('second', $b->body);
    }

    #[Test]
    public function custom_normalize_rehydrate_and_key_closures_replace_the_defaults(): void
    {
        $store = [];
        $fake = new Fake();
        $fake->queue(new Response(200, [], 'origin'));
        $fake->queue(new Response(200, [], 'never-reached'));

        $caching = new CachingHttpTransport(
            $fake,
            $this->arrayCache($store),
            normalize: static fn(Response $response): array => ['payload' => $response->body],
            rehydrate: static fn(array $stored): string => 'rehydrated:' . $stored['payload'],
            keyFor: static fn(string $method, string $url, array $options): string => "$method $url",
        );

        $first  = $caching->request('GET', 'https://api.example.com/v1/things');
        $second = $caching->request('GET', 'https://api.example.com/v1/things');

        $fake->assertSentCount(1);
        self::assertSame('rehydrated:origin', $first);
        self::assertSame('rehydrated:origin', $second);
        self::assertSame(['GET https://api.example.com/v1/things' => ['payload' => 'origin']], $store);
    }

    #[Test]
    public function default_rehydrate_tolerates_a_partial_stored_array(): void
    {
        $store = ['sas-cache:anything' => []];
        $fake = new Fake();

        $caching = new CachingHttpTransport(
            $fake,
            $this->arrayCache($store),
            keyFor: static fn(): string => 'sas-cache:anything',
        );

        $response = $caching->request('GET', 'https://api.example.com/v1/things');

        $fake->assertSentCount(0);
        self::assertSame(0, $response->status);
        self::assertSame([], $response->headers);
        self::assertSame('', $response->body);
    }
}
