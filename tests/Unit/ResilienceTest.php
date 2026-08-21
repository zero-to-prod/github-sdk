<?php

namespace Unit;

use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use Tests\Fixtures\FixtureRoute;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\GitHubSdk;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;
use Zerotoprod\GitHubSdk\Hook;
use Zerotoprod\GitHubSdk\HookContext;
use Zerotoprod\GitHubSdk\HttpTransport;
use Zerotoprod\GitHubSdk\Options;
use Zerotoprod\GitHubSdk\Response;
use Zerotoprod\GitHubSdk\RetryingHttpTransport;

/**
 * Covers the production-hardening surface: malformed response bodies, header
 * precedence between config / hook / call, credential redaction, and
 * {@see RetryingHttpTransport}.
 *
 * Every client here dispatches {@see FixtureRoute} — the shared suite never
 * names a generated symbol, so these tests keep merging into derived packages.
 */
class ResilienceTest extends TestCase
{
    /** @param  array<string, mixed>  $config */
    private function api(array $config = [], ?HttpTransport $transport = null): GitHubSdk
    {
        return new GitHubSdk(
            [GitHubSdkConfig::route_enum => FixtureRoute::class, ...$config],
            $transport ?? new \Zerotoprod\GitHubSdk\Internal\Fake(),
        );
    }

    // ─── Malformed 2xx bodies never reach a model as a scalar ───────────

    /** @return array<string, array{string}> */
    public static function scalarBodies(): array
    {
        return [
            'json string' => ['"just a string"'],
            'json int' => ['42'],
            'json float' => ['1.5'],
            'json bool' => ['true'],
        ];
    }

    #[Test]
    #[\PHPUnit\Framework\Attributes\DataProvider('scalarBodies')]
    public function a_scalar_2xx_body_yields_an_empty_model_instead_of_a_type_error(string $body): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();
        $fake->queue(new Response(200, [], $body));

        $result = $this->api(transport: $fake)->getThing('a');

        self::assertInstanceOf(\Tests\Fixtures\Models\FixtureThing::class, $result->data);
        self::assertNull($result->data->id);
        // The body a model could not use is still there untouched.
        self::assertSame($body, $result->response->body);
    }

    #[Test]
    public function a_scalar_error_body_still_hydrates_errors(): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();
        $fake->queue(new Response(500, [], '"boom"'));

        $result = $this->api(transport: $fake)->getThing('a');

        self::assertTrue($result->failed());
        self::assertNotNull($result->errors);
        self::assertNull($result->errors->message);
    }

    #[Test]
    public function an_html_error_page_and_an_empty_body_degrade_to_errors(): void
    {
        foreach (['<html>502 Bad Gateway</html>', ''] as $body) {
            $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();
            $fake->queue(new Response(502, [], $body));

            $result = $this->api(transport: $fake)->getThing('a');

            self::assertTrue($result->failed());
            self::assertNotNull($result->errors);
        }
    }

    #[Test]
    public function a_keyed_json_lookup_on_a_scalar_body_returns_the_default(): void
    {
        $response = new Response(200, [], '"just a string"');

        self::assertSame('just a string', $response->json());
        self::assertSame('fallback', $response->json('name', 'fallback'));
        self::assertNull($response->json('name'));
    }

    // ─── Header precedence: config → hook → call ───────────────────────

    #[Test]
    public function config_headers_are_sent_with_every_request(): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();
        $api = $this->api([GitHubSdkConfig::headers => ['Authorization' => 'Bearer t']], $fake);

        $api->getThing('a');
        $api->listThings();

        foreach ($fake->recorded() as $request) {
            self::assertSame(['Authorization' => 'Bearer t'], $request['options'][Options::headers]);
        }
    }

    #[Test]
    public function a_per_call_header_wins_over_the_same_config_header(): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();

        $this->api([GitHubSdkConfig::headers => ['Authorization' => 'Bearer default', 'X-Tenant' => 'acme']], $fake)
            ->getThing('a', [Options::headers => ['Authorization' => 'Bearer override']]);

        self::assertSame(
            ['Authorization' => 'Bearer override', 'X-Tenant' => 'acme'],
            $fake->recorded()[0]['options'][Options::headers],
        );
    }

    #[Test]
    public function with_headers_adds_to_a_request_instead_of_replacing_its_headers(): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();

        $api = new GitHubSdk(
            [GitHubSdkConfig::route_enum => FixtureRoute::class, GitHubSdkConfig::headers => ['Authorization' => 'Bearer t']],
            $fake,
            [Hook::before->value => fn(HookContext $ctx) => $ctx->withHeaders(['X-Trace-Id' => 'trace-1'])],
        );

        $api->getThing('a', [Options::headers => ['X-Request-Id' => 'req-1']]);

        self::assertSame(
            ['Authorization' => 'Bearer t', 'X-Request-Id' => 'req-1', 'X-Trace-Id' => 'trace-1'],
            $fake->recorded()[0]['options'][Options::headers],
        );
    }

    #[Test]
    public function with_options_merges_options_and_leaves_the_rest_in_place(): void
    {
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();

        $api = new GitHubSdk(
            [GitHubSdkConfig::route_enum => FixtureRoute::class],
            $fake,
            [Hook::before->value => fn(HookContext $ctx) => $ctx->withOptions(['timeout' => 5])],
        );

        $api->getThing('a', [Options::headers => ['X-Request-Id' => 'req-1']]);

        $options = $fake->recorded()[0]['options'];
        self::assertSame(5, $options['timeout']);
        self::assertSame(['X-Request-Id' => 'req-1'], $options[Options::headers]);
    }

    // ─── Redaction ─────────────────────────────────────────────────────

    #[Test]
    public function redacted_masks_credential_headers_but_to_array_does_not(): void
    {
        $captured = [];
        $fake = new \Zerotoprod\GitHubSdk\Internal\Fake();

        $api = new GitHubSdk(
            [
                GitHubSdkConfig::route_enum => FixtureRoute::class,
                GitHubSdkConfig::headers => [
                    'Authorization' => 'Bearer super-secret',
                    'X-Api-Key' => 'key-123',
                    'X-Refresh-Token' => 'refresh-123',
                    'Cookie' => 'session=abc',
                    'X-Tenant' => 'acme',
                ],
            ],
            $fake,
            [Hook::before->value => function (HookContext $ctx) use (&$captured) {
                $captured = $ctx->redacted();
            }],
        );

        $api->getThing('a');

        self::assertSame([
            'Authorization' => '***',
            'X-Api-Key' => '***',
            'X-Refresh-Token' => '***',
            'Cookie' => '***',
            'X-Tenant' => 'acme',
        ], $captured['options'][Options::headers]);

        // The real values still went out — redaction is for logs only.
        self::assertSame('Bearer super-secret', $fake->recorded()[0]['options'][Options::headers]['Authorization']);
    }

    #[Test]
    public function redacted_is_safe_on_a_request_with_no_headers(): void
    {
        $captured = [];

        $api = new GitHubSdk(
            [GitHubSdkConfig::route_enum => FixtureRoute::class],
            new \Zerotoprod\GitHubSdk\Internal\Fake(),
            [Hook::before->value => function (HookContext $ctx) use (&$captured) {
                $captured = $ctx->redacted();
            }],
        );

        $api->getThing('a');

        self::assertArrayNotHasKey(Options::headers, $captured['options']);
    }

    // ─── RetryingHttpTransport ─────────────────────────────────────────

    /**
     * A transport that replays a scripted list of responses/throwables and
     * counts how many times it was asked.
     */
    private function scripted(array $script): object
    {
        return new class ($script) implements HttpTransport {
            public int $calls = 0;

            /** @param  array<int, mixed>  $script */
            public function __construct(private array $script) {}

            public function request(string $method, string $url, array $options = []): mixed
            {
                $this->calls++;
                $next = array_shift($this->script) ?? new Response(200, [], '{}');

                if ($next instanceof \Throwable) {
                    throw $next;
                }

                return $next;
            }
        };
    }

    /** @return array<int, float> */
    private function retry(object $inner, array $args = []): array
    {
        $slept = [];
        $transport = new RetryingHttpTransport(
            inner: $inner,
            maxAttempts: $args['maxAttempts'] ?? 3,
            baseDelay: $args['baseDelay'] ?? 0.5,
            maxDelay: $args['maxDelay'] ?? 30.0,
            retryStatuses: $args['retryStatuses'] ?? null,
            retryMethods: $args['retryMethods'] ?? null,
            sleeper: function (float $s) use (&$slept) {
                $slept[] = $s;
            },
        );

        $args['run']($transport);

        return $slept;
    }

    #[Test]
    public function it_retries_a_503_and_returns_the_eventual_success(): void
    {
        $inner = $this->scripted([
            new Response(503, [], ''),
            new Response(503, [], ''),
            new Response(200, [], '{"id":"a"}'),
        ]);

        $result = null;
        $slept = $this->retry($inner, [
            'run' => function (RetryingHttpTransport $t) use (&$result) {
                $result = $t->request('GET', 'https://x/v1/things/a');
            },
        ]);

        self::assertSame(3, $inner->calls);
        self::assertCount(2, $slept);
        self::assertSame(200, $result->status());
    }

    #[Test]
    public function it_gives_up_after_max_attempts_and_returns_the_last_response(): void
    {
        $inner = $this->scripted([
            new Response(500, [], ''),
            new Response(500, [], ''),
            new Response(500, [], ''),
        ]);

        $result = null;
        $slept = $this->retry($inner, [
            'run' => function (RetryingHttpTransport $t) use (&$result) {
                $result = $t->request('GET', 'https://x');
            },
        ]);

        self::assertSame(3, $inner->calls);
        self::assertCount(2, $slept, 'no sleep after the final attempt');
        self::assertSame(500, $result->status());
    }

    #[Test]
    public function it_does_not_retry_a_422(): void
    {
        $inner = $this->scripted([new Response(422, [], '{}')]);

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame(1, $inner->calls);
        self::assertSame([], $slept);
    }

    #[Test]
    public function it_retries_a_thrown_connection_error_then_rethrows_on_the_last_attempt(): void
    {
        $inner = $this->scripted([
            new RuntimeException('cURL error: connection refused'),
            new RuntimeException('cURL error: connection refused'),
            new RuntimeException('cURL error: connection refused'),
        ]);

        $this->expectException(RuntimeException::class);

        try {
            $this->retry($inner, [
                'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
            ]);
        } finally {
            self::assertSame(3, $inner->calls);
        }
    }

    #[Test]
    public function it_recovers_from_a_thrown_error_when_a_later_attempt_succeeds(): void
    {
        $inner = $this->scripted([
            new RuntimeException('cURL error: timeout'),
            new Response(200, [], '{"id":"a"}'),
        ]);

        $result = null;
        $this->retry($inner, [
            'run' => function (RetryingHttpTransport $t) use (&$result) {
                $result = $t->request('GET', 'https://x');
            },
        ]);

        self::assertSame(2, $inner->calls);
        self::assertSame(200, $result->status());
    }

    #[Test]
    public function a_post_is_not_retried_by_default(): void
    {
        $inner = $this->scripted([new Response(503, [], ''), new Response(200, [], '{}')]);

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('POST', 'https://x'),
        ]);

        self::assertSame(1, $inner->calls, 'a POST timeout is not proof the server ignored it');
        self::assertSame([], $slept);
    }

    #[Test]
    public function a_post_is_retried_when_the_method_filter_is_opened_up(): void
    {
        $inner = $this->scripted([new Response(503, [], ''), new Response(200, [], '{}')]);

        $this->retry($inner, [
            'retryMethods' => [],
            'run' => fn(RetryingHttpTransport $t) => $t->request('POST', 'https://x'),
        ]);

        self::assertSame(2, $inner->calls);
    }

    #[Test]
    public function retry_after_in_seconds_overrides_the_computed_backoff(): void
    {
        $inner = $this->scripted([
            new Response(429, ['Retry-After' => '7'], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame([7.0], $slept);
    }

    #[Test]
    public function retry_after_as_an_http_date_is_honoured(): void
    {
        $inner = $this->scripted([
            new Response(429, ['Retry-After' => gmdate('D, d M Y H:i:s \G\M\T', time() + 5)], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertCount(1, $slept);
        self::assertGreaterThanOrEqual(3.0, $slept[0]);
        self::assertLessThanOrEqual(6.0, $slept[0]);
    }

    #[Test]
    public function retry_after_is_clamped_to_max_delay(): void
    {
        $inner = $this->scripted([
            new Response(429, ['Retry-After' => '86400'], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'maxDelay' => 2.0,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame([2.0], $slept);
    }

    #[Test]
    public function backoff_grows_and_stays_within_the_jitter_window(): void
    {
        $inner = $this->scripted([
            new Response(503, [], ''),
            new Response(503, [], ''),
            new Response(503, [], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'maxAttempts' => 4,
            'baseDelay' => 1.0,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertCount(3, $slept);
        // Full jitter: each delay is uniform in [0, base * 2^n].
        foreach ([1.0, 2.0, 4.0] as $i => $ceiling) {
            self::assertGreaterThanOrEqual(0.0, $slept[$i]);
            self::assertLessThanOrEqual($ceiling, $slept[$i]);
        }
    }

    #[Test]
    public function max_attempts_of_one_disables_retrying(): void
    {
        $inner = $this->scripted([new Response(503, [], ''), new Response(200, [], '{}')]);

        $slept = $this->retry($inner, [
            'maxAttempts' => 1,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame(1, $inner->calls);
        self::assertSame([], $slept);
    }

    #[Test]
    public function a_response_type_that_reports_no_status_is_never_retried_on_status(): void
    {
        $inner = new class implements HttpTransport {
            public int $calls = 0;

            public function request(string $method, string $url, array $options = []): mixed
            {
                $this->calls++;

                return ['status' => 503];
            }
        };

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame(1, $inner->calls);
        self::assertSame([], $slept);
    }

    #[Test]
    public function a_max_delay_of_zero_sleeps_for_no_time_at_all(): void
    {
        $inner = $this->scripted([new Response(503, [], ''), new Response(200, [], '{}')]);

        $slept = $this->retry($inner, [
            'maxDelay' => 0.0,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame([0.0], $slept);
        self::assertSame(2, $inner->calls);
    }

    #[Test]
    public function an_unparseable_retry_after_falls_back_to_the_computed_backoff(): void
    {
        $inner = $this->scripted([
            new Response(429, ['Retry-After' => 'whenever'], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'baseDelay' => 1.0,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertCount(1, $slept);
        self::assertLessThanOrEqual(1.0, $slept[0]);
    }

    #[Test]
    public function a_blank_or_absent_retry_after_falls_back_to_the_computed_backoff(): void
    {
        foreach ([['Retry-After' => '  '], []] as $headers) {
            $inner = $this->scripted([new Response(429, $headers, ''), new Response(200, [], '{}')]);

            $slept = $this->retry($inner, [
                'baseDelay' => 1.0,
                'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
            ]);

            self::assertCount(1, $slept);
            self::assertLessThanOrEqual(1.0, $slept[0]);
        }
    }

    #[Test]
    public function a_retry_after_date_in_the_past_never_yields_a_negative_delay(): void
    {
        $inner = $this->scripted([
            new Response(429, ['Retry-After' => gmdate('D, d M Y H:i:s \G\M\T', time() - 60)], ''),
            new Response(200, [], '{}'),
        ]);

        $slept = $this->retry($inner, [
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame([0.0], $slept);
    }

    #[Test]
    public function the_default_sleeper_actually_sleeps_between_attempts(): void
    {
        // `Retry-After` wins over the jittered backoff, so the slept duration is
        // exact rather than random — a millisecond, which keeps this instant
        // while still entering usleep().
        $inner = $this->scripted([
            new Response(503, ['Retry-After' => '0.001'], ''),
            new Response(200, [], '{}'),
        ]);

        $transport = new RetryingHttpTransport($inner, maxAttempts: 2);

        $started = microtime(true);
        $response = $transport->request('GET', 'https://x');
        $elapsed = microtime(true) - $started;

        self::assertSame(2, $inner->calls);
        self::assertSame(200, $response->status());
        self::assertLessThan(1.0, $elapsed);
    }

    #[Test]
    public function a_response_that_reports_a_status_but_no_headers_still_retries_on_backoff(): void
    {
        $inner = new class implements HttpTransport {
            public int $calls = 0;

            public function request(string $method, string $url, array $options = []): mixed
            {
                $this->calls++;

                // status() but no header(): retryable on status, with nothing to
                // read a Retry-After from.
                return new class ($this->calls) {
                    public function __construct(private int $calls) {}

                    public function status(): int
                    {
                        return $this->calls === 1 ? 503 : 200;
                    }
                };
            }
        };

        $slept = $this->retry($inner, [
            'baseDelay' => 1.0,
            'run' => fn(RetryingHttpTransport $t) => $t->request('GET', 'https://x'),
        ]);

        self::assertSame(2, $inner->calls);
        self::assertCount(1, $slept);
        self::assertLessThanOrEqual(1.0, $slept[0]);
    }

    #[Test]
    public function it_drives_a_full_api_call_through_the_dispatcher(): void
    {
        $inner = $this->scripted([
            new Response(503, [], ''),
            new Response(200, [], '{"id":"a","name":"Thing"}'),
        ]);

        $api = new GitHubSdk(
            [GitHubSdkConfig::route_enum => FixtureRoute::class],
            new RetryingHttpTransport($inner, sleeper: fn(float $s) => null),
        );

        $result = $api->getThing('a');

        self::assertSame(2, $inner->calls);
        self::assertSame('Thing', $result->data->name);
    }

    // ─── Curl connect timeout ──────────────────────────────────────────

    #[Test]
    public function the_curl_transport_declares_a_default_connect_timeout(): void
    {
        self::assertSame(10, \Zerotoprod\GitHubSdk\CurlHttpTransport::default_connect_timeout);
    }
}
