<?php

namespace Unit;

use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use Tests\Fixtures\FixtureRoute;
use Tests\TestCase;
use Throwable;
use Zerotoprod\GitHubSdk\GitHubSdk;
use Zerotoprod\GitHubSdk\GitHubSdkConfig;
use Zerotoprod\GitHubSdk\Hook;
use Zerotoprod\GitHubSdk\HookContext;
use Zerotoprod\GitHubSdk\HttpTransport;
use Zerotoprod\GitHubSdk\Internal\Fake;
use Zerotoprod\GitHubSdk\Internal\HttpMethod;
use Zerotoprod\GitHubSdk\Options;
use Zerotoprod\GitHubSdk\Response;

/**
 * The lifecycle hooks around every dispatch.
 *
 * Dispatched against {@see FixtureRoute} so the suite survives
 * `composer generate-sdk` rewriting `src/ApiRoute.php`.
 */
class HookTest extends TestCase
{
    /** @var array<string, mixed> */
    private array $config = [
        GitHubSdkConfig::url => 'https://api.example.com',
        GitHubSdkConfig::route_enum => FixtureRoute::class,
    ];

    #[Test]
    public function before_hook_receives_request_context(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $captured = null;
        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => [
                function (HookContext $ctx) use (&$captured): void {
                    $captured = $ctx;
                },
            ],
        ]);

        $api->getThing('01H');

        self::assertInstanceOf(HookContext::class, $captured);
        self::assertSame(Hook::before, $captured->Hook);
        self::assertSame(HttpMethod::GET, $captured->HttpMethod);
        self::assertSame('https://api.example.com/v1/things/01H', $captured->url);
        self::assertNull($captured->response);
    }

    #[Test]
    public function before_hook_can_mutate_the_outgoing_request(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => [
                fn(HookContext $ctx): HookContext => HookContext::from([
                    ...$ctx->toArray(),
                    HookContext::options => [
                        ...$ctx->options,
                        Options::headers => ['X-Trace-Id' => 'trace-123'],
                    ],
                ]),
            ],
        ]);

        $api->getThing('01H');

        $recorded = $fake->recorded()[0];
        self::assertSame('trace-123', $recorded['options'][Options::headers]['X-Trace-Id']);
    }

    #[Test]
    public function before_hook_returning_non_context_does_not_replace_context(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => [
                fn(HookContext $ctx) => 'ignored return value',
            ],
        ]);

        $api->getThing('01H');

        self::assertSame('https://api.example.com/v1/things/01H', $fake->recorded()[0]['url']);
    }

    #[Test]
    public function before_hooks_run_in_registration_order_and_mutations_chain(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $order = [];
        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => [
                function (HookContext $ctx) use (&$order): HookContext {
                    $order[] = 'first';
                    return HookContext::from([
                        ...$ctx->toArray(),
                        HookContext::options => [...$ctx->options, Options::headers => ['X-Step' => 'one']],
                    ]);
                },
                function (HookContext $ctx) use (&$order): HookContext {
                    $order[] = 'second';
                    // sees the mutation from the first hook
                    self::assertSame('one', $ctx->options[Options::headers]['X-Step']);
                    return HookContext::from([
                        ...$ctx->toArray(),
                        HookContext::options => [...$ctx->options, Options::headers => ['X-Step' => 'two']],
                    ]);
                },
            ],
        ]);

        $api->getThing('01H');

        self::assertSame(['first', 'second'], $order);
        self::assertSame('two', $fake->recorded()[0]['options'][Options::headers]['X-Step']);
    }

    #[Test]
    public function after_hook_receives_context_with_response_attached(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(201, [], json_encode(['data' => ['id' => 'created']]) ?: ''));

        $captured = null;
        $api = new GitHubSdk($this->config, $fake, [
            Hook::after->value => [
                function (HookContext $ctx) use (&$captured): void {
                    $captured = $ctx;
                },
            ],
        ]);

        $api->getThing('01H');

        self::assertInstanceOf(HookContext::class, $captured);
        self::assertSame(Hook::after, $captured->Hook);
        self::assertInstanceOf(Response::class, $captured->response);
        self::assertSame(201, $captured->response->status());
    }

    #[Test]
    public function before_and_after_hooks_both_fire_for_a_single_request(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $phases = [];
        $record = function (HookContext $ctx) use (&$phases): void {
            $phases[] = $ctx->Hook->value;
        };
        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => [$record],
            Hook::after->value => [$record],
        ]);

        $api->getThing('01H');

        self::assertSame(['before', 'after'], $phases);
    }

    #[Test]
    public function on_exception_hook_receives_context_and_throwable_then_rethrows(): void
    {
        $boom = new RuntimeException('connection refused');
        $transport = $this->throwingTransport($boom);

        $captured = null;
        $capturedError = null;
        $api = new GitHubSdk($this->config, $transport, [
            Hook::onException->value => [
                function (HookContext $ctx, Throwable $e) use (&$captured, &$capturedError): void {
                    $captured = $ctx;
                    $capturedError = $e;
                },
            ],
        ]);

        try {
            $api->getThing('01H');
            self::fail('Expected the transport exception to be re-thrown.');
        } catch (RuntimeException $e) {
            self::assertSame($boom, $e);
        }

        self::assertInstanceOf(HookContext::class, $captured);
        self::assertSame(Hook::onException, $captured->Hook);
        self::assertNull($captured->response);
        self::assertSame($boom, $capturedError);
    }

    #[Test]
    public function after_hooks_do_not_run_when_transport_throws(): void
    {
        $transport = $this->throwingTransport(new RuntimeException('boom'));

        $afterRan = false;
        $api = new GitHubSdk($this->config, $transport, [
            Hook::after->value => [
                function () use (&$afterRan): void {
                    $afterRan = true;
                },
            ],
        ]);

        try {
            $api->getThing('01H');
        } catch (RuntimeException) {
            // expected
        }

        self::assertFalse($afterRan);
    }

    #[Test]
    public function phase_accepts_a_single_callable_instead_of_an_array(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $captured = null;
        $api = new GitHubSdk($this->config, $fake, [
            // A lone closure — not wrapped in an array.
            Hook::before->value => function (HookContext $ctx) use (&$captured): void {
                $captured = $ctx;
            },
        ]);

        $api->getThing('01H');

        self::assertInstanceOf(HookContext::class, $captured);
        self::assertSame(Hook::before, $captured->Hook);
        self::assertSame('https://api.example.com/v1/things/01H', $captured->url);
    }

    #[Test]
    public function single_callable_before_hook_can_mutate_the_request(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => fn(HookContext $ctx): HookContext => HookContext::from([
                ...$ctx->toArray(),
                HookContext::options => [...$ctx->options, Options::headers => ['X-Trace-Id' => 'trace-123']],
            ]),
        ]);

        $api->getThing('01H');

        self::assertSame('trace-123', $fake->recorded()[0]['options'][Options::headers]['X-Trace-Id']);
    }

    #[Test]
    public function single_callable_and_array_forms_can_be_mixed_across_phases(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $phases = [];
        $record = function (HookContext $ctx) use (&$phases): void {
            $phases[] = $ctx->Hook->value;
        };
        $api = new GitHubSdk($this->config, $fake, [
            Hook::before->value => $record,    // single callable
            Hook::after->value => [$record],   // array of callables
        ]);

        $api->getThing('01H');

        self::assertSame(['before', 'after'], $phases);
    }

    #[Test]
    public function single_callable_on_exception_hook_runs_then_rethrows(): void
    {
        $boom = new RuntimeException('connection refused');
        $transport = $this->throwingTransport($boom);

        $captured = null;
        $capturedError = null;
        $api = new GitHubSdk($this->config, $transport, [
            Hook::onException->value => function (HookContext $ctx, Throwable $e) use (&$captured, &$capturedError): void {
                $captured = $ctx;
                $capturedError = $e;
            },
        ]);

        try {
            $api->getThing('01H');
            self::fail('Expected the transport exception to be re-thrown.');
        } catch (RuntimeException $e) {
            self::assertSame($boom, $e);
        }

        self::assertInstanceOf(HookContext::class, $captured);
        self::assertSame(Hook::onException, $captured->Hook);
        self::assertSame($boom, $capturedError);
    }

    #[Test]
    public function no_hooks_configured_leaves_requests_unchanged(): void
    {
        $fake = new Fake();
        $fake->queue(new Response(200, [], json_encode(['data' => []]) ?: ''));

        $result = (new GitHubSdk($this->config, $fake))->getThing('01H');

        self::assertTrue($result->ok());
        $fake->assertSentCount(1);
    }

    /**
     * A transport that always throws — used to exercise the onException phase.
     *
     * @return HttpTransport<Response>
     */
    private function throwingTransport(Throwable $e): HttpTransport
    {
        return new class ($e) implements HttpTransport {
            public function __construct(private readonly Throwable $e) {}

            /** @param  array<string, mixed>  $options */
            public function request(string $method, string $url, array $options = []): mixed
            {
                throw $this->e;
            }
        };
    }
}
