<?php

namespace Unit;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use Tests\TestCase;
use Zerotoprod\GitHubSdk\CurlHttpTransport;
use Zerotoprod\GitHubSdk\LaravelHttpTransport;
use Zerotoprod\GitHubSdk\Options;
use Zerotoprod\GitHubSdk\Response;

/**
 * Exercises the two real transports.
 *
 * CurlHttpTransport talks to a throwaway PHP built-in server bound to a free
 * loopback port for the lifetime of this class — no outbound network, no
 * fixtures. LaravelHttpTransport is driven through Http::fake().
 */
class TransportTest extends TestCase
{
    /** Base URL of the loopback echo server, or null when it could not start. */
    private static ?string $base = null;

    /** @var resource|null */
    private static $server = null;

    private static ?string $router = null;

    public static function setUpBeforeClass(): void
    {
        $socket = @stream_socket_server('tcp://127.0.0.1:0');
        if ($socket === false) {
            return;
        }

        $name = stream_socket_get_name($socket, false);
        fclose($socket);
        if ($name === false) {
            return;
        }

        $port = (int) substr($name, (int) strrpos($name, ':') + 1);

        self::$router = (string) tempnam(sys_get_temp_dir(), 'sdk-echo-') . '.php';
        file_put_contents(self::$router, <<<'PHP'
            <?php
            if (isset($_GET['status'])) {
                http_response_code((int) $_GET['status']);
            }
            header('Content-Type: application/json');
            header('X-Echo: yes');
            echo json_encode([
                'method' => $_SERVER['REQUEST_METHOD'],
                'uri' => $_SERVER['REQUEST_URI'],
                'query' => $_SERVER['QUERY_STRING'] ?? '',
                'content_type' => $_SERVER['CONTENT_TYPE'] ?? null,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'custom' => $_SERVER['HTTP_X_CUSTOM'] ?? null,
                'body' => file_get_contents('php://input'),
            ]);
            PHP);

        $server = proc_open(
            [PHP_BINARY, '-S', "127.0.0.1:$port", self::$router],
            [1 => ['file', '/dev/null', 'w'], 2 => ['file', '/dev/null', 'w']],
            $pipes,
        );

        if (!is_resource($server)) {
            return;
        }

        self::$server = $server;

        for ($i = 0; $i < 100; $i++) {
            $probe = @fsockopen('127.0.0.1', $port, $errno, $error, 0.1);
            if (is_resource($probe)) {
                fclose($probe);
                self::$base = "http://127.0.0.1:$port";

                return;
            }
            usleep(50_000);
        }
    }

    public static function tearDownAfterClass(): void
    {
        if (is_resource(self::$server)) {
            proc_terminate(self::$server);
            proc_close(self::$server);
        }
        if (self::$router !== null && file_exists(self::$router)) {
            unlink(self::$router);
        }

        self::$server = null;
        self::$base = null;
        self::$router = null;
    }

    private function base(): string
    {
        if (self::$base === null) {
            self::markTestSkipped('Could not start a loopback HTTP server.');
        }

        return self::$base;
    }

    /**
     * The echo server's decoded body.
     *
     * @return array<string, mixed>
     */
    private function echoed(Response $response): array
    {
        /** @var array<string, mixed> $decoded */
        $decoded = $response->json();

        return $decoded;
    }

    // ──────────────────────────────────────────────────────────────
    // CurlHttpTransport
    // ──────────────────────────────────────────────────────────────

    #[Test]
    public function curl_get_returns_a_response_with_parsed_status_headers_and_body(): void
    {
        $response = (new CurlHttpTransport())->request('GET', $this->base() . '/v1/widgets');

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(200, $response->status);
        self::assertTrue($response->ok());
        self::assertSame('yes', $response->header('X-Echo'));
        self::assertSame('application/json', $response->header('Content-Type'));

        $echoed = $this->echoed($response);
        self::assertSame('GET', $echoed['method']);
        self::assertSame('/v1/widgets', $echoed['uri']);
    }

    #[Test]
    public function curl_accepts_an_explicit_connect_timeout(): void
    {
        $response = (new CurlHttpTransport())->request(
            'GET',
            $this->base() . '/v1/widgets',
            ['timeout' => 5, 'connect_timeout' => 2],
        );

        self::assertSame(200, $response->status);
    }

    #[Test]
    public function curl_preserves_a_non_2xx_status(): void
    {
        $response = (new CurlHttpTransport())->request('GET', $this->base() . '/v1/widgets?status=422');

        self::assertSame(422, $response->status);
        self::assertTrue($response->failed());
    }

    #[Test]
    public function curl_uppercases_the_method_and_sends_a_json_body(): void
    {
        $response = (new CurlHttpTransport())->request(
            'patch',
            $this->base() . '/v1/widgets/01H',
            ['json' => ['name' => 'Renamed'], Options::headers => ['X-Custom' => 'abc'], 'timeout' => 5],
        );

        $echoed = $this->echoed($response);
        self::assertSame('PATCH', $echoed['method']);
        self::assertSame('{"name":"Renamed"}', $echoed['body']);
        self::assertSame('application/json', $echoed['content_type']);
        self::assertSame('abc', $echoed['custom']);
    }

    #[Test]
    public function curl_sends_form_params_as_url_encoded(): void
    {
        $response = (new CurlHttpTransport())->request(
            'POST',
            $this->base() . '/v1/widgets',
            ['form_params' => ['name' => 'Created'], 'json' => ['ignored' => true]],
        );

        $echoed = $this->echoed($response);
        self::assertSame('POST', $echoed['method']);
        self::assertSame('name=Created', $echoed['body']);
        self::assertSame('application/x-www-form-urlencoded', $echoed['content_type']);
    }

    #[Test]
    public function curl_appends_the_query_option_to_the_url(): void
    {
        $transport = new CurlHttpTransport();

        $fresh = $transport->request('GET', $this->base() . '/v1/widgets', [Options::query => ['per_page' => 50]]);
        self::assertSame('per_page=50', $this->echoed($fresh)['query']);

        // A URL that already carries a query string gets an `&` separator.
        $merged = $transport->request('GET', $this->base() . '/v1/widgets?page=2', [Options::query => ['per_page' => 50]]);
        self::assertSame('page=2&per_page=50', $this->echoed($merged)['query']);
    }

    #[Test]
    public function curl_applies_native_curl_options(): void
    {
        $response = (new CurlHttpTransport())->request(
            'GET',
            $this->base() . '/v1/widgets',
            ['curl' => [CURLOPT_USERAGENT => 'sdk-test-agent']],
        );

        self::assertSame('sdk-test-agent', $this->echoed($response)['user_agent']);
    }

    #[Test]
    public function curl_throws_a_runtime_exception_on_a_connection_failure(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/^cURL error: /');

        // Port 1 is reserved and never listening.
        (new CurlHttpTransport())->request('GET', 'http://127.0.0.1:1/v1/widgets');
    }

    #[Test]
    public function curl_falls_back_to_a_get_on_a_root_path_when_url_and_method_are_empty(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/^cURL error: /');

        (new CurlHttpTransport())->request('', '');
    }

    // ──────────────────────────────────────────────────────────────
    // LaravelHttpTransport
    // ──────────────────────────────────────────────────────────────

    /** @param  callable(LaravelHttpTransport): void  $test */
    private function withLaravel(callable $test): void
    {
        Facade::clearResolvedInstances();
        Facade::setFacadeApplication(new Container());

        try {
            $test(new LaravelHttpTransport());
        } finally {
            Facade::clearResolvedInstances();
            Facade::setFacadeApplication(null);
        }
    }

    #[Test]
    public function laravel_transport_prefixes_the_default_host_for_a_path_only_url(): void
    {
        $this->withLaravel(function (LaravelHttpTransport $transport): void {
            Http::fake(['*' => Http::response(['widgets' => []])]);

            $response = $transport->request('GET', '/v1/widgets');

            self::assertTrue($response->successful());
            Http::assertSent(
                fn($request): bool => $request->url() === LaravelHttpTransport::default_host . '/v1/widgets'
                    && $request->method() === 'GET',
            );
        });
    }

    #[Test]
    public function laravel_transport_normalizes_a_url_without_a_leading_slash(): void
    {
        $this->withLaravel(function (LaravelHttpTransport $transport): void {
            Http::fake(['*' => Http::response([])]);

            $transport->request('GET', 'v1/widgets');

            Http::assertSent(
                fn($request): bool => $request->url() === LaravelHttpTransport::default_host . '/v1/widgets',
            );
        });
    }

    #[Test]
    public function laravel_transport_appends_the_query_option_and_forwards_headers(): void
    {
        $this->withLaravel(function (LaravelHttpTransport $transport): void {
            Http::fake(['*' => Http::response([])]);

            $transport->request('GET', 'https://api.example.com/v1/widgets?page=2', [
                Options::query => ['per_page' => 50],
                Options::headers => ['X-Custom' => 'abc'],
                'timeout' => 5,
            ]);

            Http::assertSent(
                fn($request): bool => $request->url() === 'https://api.example.com/v1/widgets?page=2&per_page=50'
                    && $request->hasHeader('X-Custom', 'abc'),
            );
        });
    }

    #[Test]
    public function laravel_transport_sends_a_json_body(): void
    {
        $this->withLaravel(function (LaravelHttpTransport $transport): void {
            Http::fake(['*' => Http::response([])]);

            $transport->request('PATCH', 'https://api.example.com/v1/widgets/01H', [
                'json' => ['name' => 'Renamed'],
            ]);

            Http::assertSent(
                fn($request): bool => $request->method() === 'PATCH'
                    && $request->data() === ['name' => 'Renamed']
                    && $request->body() === '{"name":"Renamed"}',
            );
        });
    }

    #[Test]
    public function laravel_transport_sends_form_params_as_a_form_request(): void
    {
        $this->withLaravel(function (LaravelHttpTransport $transport): void {
            Http::fake(['*' => Http::response([])]);

            $transport->request('POST', 'https://api.example.com/v1/widgets', [
                'form_params' => ['name' => 'Created'],
            ]);

            Http::assertSent(
                fn($request): bool => $request->method() === 'POST'
                    && $request->body() === 'name=Created'
                    && $request->hasHeader('Content-Type', 'application/x-www-form-urlencoded'),
            );
        });
    }
}
