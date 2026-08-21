<?php

namespace Zerotoprod\Sdk;

use Closure;

/**
 * Read-through caching decorator for any {@see HttpTransport}.
 *
 * Wraps an inner transport and routes idempotent `GET` requests through a
 * caller-supplied cache closure; every other method passes straight through.
 * The closure owns the backend and TTL entirely — e.g. on Laravel:
 *
 *     new CachingHttpTransport(
 *         new CurlHttpTransport(),
 *         fn (string $key, Closure $fetch) => Cache::remember($key, 60, $fetch),
 *     );
 *
 * What is stored in the cache is the *normalized* response — a plain
 * `['status', 'headers', 'body']` array — never the response object itself, so
 * it survives serialization regardless of the inner transport (the Laravel
 * transport's `Illuminate\Http\Client\Response` is stream-backed and would not).
 * On both a hit and a miss the array is passed back through `$rehydrate` to
 * reconstruct the inner transport's native response type, keeping the return
 * type identical to an un-cached call.
 *
 * The defaults target this package's own {@see Response} (the type returned by
 * {@see CurlHttpTransport} and {@see Internal\Fake}). To wrap a transport that
 * returns a different type, supply matching `$normalize` / `$rehydrate`
 * closures.
 *
 * @template TResponse
 * @implements HttpTransport<TResponse>
 */
class CachingHttpTransport implements HttpTransport
{
    /**
     * @param  HttpTransport<TResponse>  $inner      Transport to delegate to on a cache miss.
     * @param  Closure(string, Closure(): array<string, mixed>): array<string, mixed>  $cache
     *             Cache resolver: receives a cache key and a fetch closure that produces the
     *             normalized response array, and must return that array (cached on a hit, freshly
     *             fetched on a miss). Mirrors Laravel's `Cache::remember($key, $ttl, $fetch)`.
     * @param  (Closure(TResponse): array<string, mixed>)|null  $normalize
     *             Converts a response into a serializable array for storage. Defaults to reading
     *             this package's {@see Response}.
     * @param  (Closure(array<string, mixed>): TResponse)|null  $rehydrate
     *             Reconstructs the inner transport's native response from a stored array. Defaults
     *             to building this package's {@see Response}.
     * @param  (Closure(string, string, array<string, mixed>): string)|null  $keyFor
     *             Builds the cache key from the request. Defaults to a hash of method, URL and options.
     */
    public function __construct(
        private readonly HttpTransport $inner,
        private readonly Closure $cache,
        private readonly ?Closure $normalize = null,
        private readonly ?Closure $rehydrate = null,
        private readonly ?Closure $keyFor = null,
    ) {}

    /**
     * @param  array<string, mixed>  $options
     *
     * @return TResponse
     */
    public function request(string $method, string $url, array $options = []): mixed
    {
        if (strtoupper($method) !== 'GET') {
            return $this->inner->request($method, $url, $options);
        }

        /** @var Closure(TResponse): array<string, mixed> $normalize */
        $normalize = $this->normalize ?? $this->defaultNormalize();
        /** @var Closure(array<string, mixed>): TResponse $rehydrate */
        $rehydrate = $this->rehydrate ?? $this->defaultRehydrate();
        $keyFor    = $this->keyFor ?? $this->defaultKeyFor();

        $stored = ($this->cache)(
            $keyFor($method, $url, $options),
            fn(): array => $normalize($this->inner->request($method, $url, $options)),
        );

        return $rehydrate($stored);
    }

    /**
     * @return Closure(Response): array{status: int, headers: array<string, string>, body: string}
     */
    private function defaultNormalize(): Closure
    {
        return static fn(Response $response): array => [
            'status'  => $response->status,
            'headers' => $response->headers,
            'body'    => $response->body,
        ];
    }

    /**
     * @return Closure(array<string, mixed>): Response
     */
    private function defaultRehydrate(): Closure
    {
        return static function (array $stored): Response {
            /** @var int $status */
            $status = $stored['status'] ?? 0;
            /** @var array<string, string> $headers */
            $headers = $stored['headers'] ?? [];
            /** @var string $body */
            $body = $stored['body'] ?? '';

            return new Response($status, $headers, $body);
        };
    }

    /**
     * @return Closure(string, string, array<string, mixed>): string
     */
    private function defaultKeyFor(): Closure
    {
        return static fn(string $method, string $url, array $options): string =>
            'sas-cache:' . hash('sha256', strtoupper($method) . ' ' . $url . ' ' . serialize($options));
    }
}
