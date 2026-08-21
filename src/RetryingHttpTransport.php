<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk;

use Closure;
use Throwable;

/**
 * Retrying decorator for any {@see HttpTransport}.
 *
 * Wraps an inner transport and retries a request that either threw (a
 * connection-level failure) or came back with a status the service itself says
 * is worth retrying — `429` and `5xx` by default. Everything else, including
 * every `4xx` that is not `429`, returns on the first attempt: a `422` is not
 * going to become valid because you asked again.
 *
 *     $api = new GitHubSdk($config, new RetryingHttpTransport(new CurlHttpTransport()));
 *
 * Only idempotent methods are retried by default (`GET`, `HEAD`, `OPTIONS`,
 * `PUT`, `DELETE`). A `POST` is left alone because a timeout is not proof the
 * server did not process it, and a blind second attempt can create a duplicate.
 * Pass `retryMethods: []` to retry regardless of method, or add `'POST'` once
 * you know the endpoint is idempotent.
 *
 * Backoff is exponential with full jitter — `random(0, base * 2^attempt)`,
 * capped at `maxDelay` — so a fleet of clients recovering from the same outage
 * does not resynchronise into a thundering herd. A `Retry-After` header wins
 * over the computed delay, in either its seconds or its HTTP-date form.
 *
 * The decorator reads the status and headers off the inner transport's response
 * by calling `status()` and `header()`, which both this package's
 * {@see Response} and `Illuminate\Http\Client\Response` provide. A transport
 * whose response offers neither is never retried on status — only on a thrown
 * exception.
 *
 * @template TResponse
 * @implements HttpTransport<TResponse>
 */
class RetryingHttpTransport implements HttpTransport
{
    /** Statuses retried when `$retryStatuses` is not given. */
    public const default_retry_statuses = [429, 500, 502, 503, 504, 507, 509];

    /** Methods retried when `$retryMethods` is not given. */
    public const default_retry_methods = ['GET', 'HEAD', 'OPTIONS', 'PUT', 'DELETE'];

    /**
     * @param  HttpTransport<TResponse>  $inner         Transport to delegate to.
     * @param  int                       $maxAttempts   Total attempts including the first. `1` disables retrying.
     * @param  float                     $baseDelay     Seconds the backoff doubles from.
     * @param  float                     $maxDelay      Ceiling for a single sleep, in seconds.
     * @param  list<int>|null            $retryStatuses Statuses to retry; defaults to {@see default_retry_statuses}.
     * @param  list<string>|null         $retryMethods  Methods eligible for retry; `[]` means every method.
     *                                                  Defaults to {@see default_retry_methods}.
     * @param  (Closure(float): void)|null  $sleeper     Receives the delay in seconds. Defaults to `usleep()`;
     *                                                   inject a recorder to keep tests instant.
     */
    public function __construct(
        private readonly HttpTransport $inner,
        private readonly int $maxAttempts = 3,
        private readonly float $baseDelay = 0.5,
        private readonly float $maxDelay = 30.0,
        private readonly ?array $retryStatuses = null,
        private readonly ?array $retryMethods = null,
        private readonly ?Closure $sleeper = null,
    ) {}

    /**
     * @param  array<string, mixed>  $options
     *
     * @return TResponse
     * @throws Throwable
     */
    public function request(string $method, string $url, array $options = []): mixed
    {
        $attempts = max(1, $this->maxAttempts);
        $statuses = $this->retryStatuses ?? self::default_retry_statuses;
        $methods  = $this->retryMethods ?? self::default_retry_methods;
        $eligible = $methods === [] || in_array(strtoupper($method), $methods, true);

        for ($attempt = 1; ; $attempt++) {
            $last = $attempt >= $attempts;

            try {
                $response = $this->inner->request($method, $url, $options);
            } catch (Throwable $e) {
                if ($last || !$eligible) {
                    throw $e;
                }

                $this->sleep($this->delayFor($attempt, null));
                continue;
            }

            if ($last || !$eligible) {
                return $response;
            }

            $status = $this->statusOf($response);
            if ($status === null || !in_array($status, $statuses, true)) {
                return $response;
            }

            $this->sleep($this->delayFor($attempt, $this->retryAfterOf($response)));
        }
    }

    /**
     * Seconds to wait before attempt `$attempt + 1`.
     *
     * `Retry-After` is the service telling you when it will be ready, so it
     * wins outright — clamped to `maxDelay` so a hostile or mistaken header
     * cannot park the process for an hour.
     */
    private function delayFor(int $attempt, ?float $retryAfter): float
    {
        if ($retryAfter !== null) {
            return min(max($retryAfter, 0.0), $this->maxDelay);
        }

        $ceiling = min($this->baseDelay * (2 ** ($attempt - 1)), $this->maxDelay);

        if ($ceiling <= 0.0) {
            return 0.0;
        }

        // Full jitter: uniform across the whole window rather than a fixed
        // fraction of it, which is what actually decorrelates retrying clients.
        return random_int(0, (int) round($ceiling * 1000)) / 1000;
    }

    private function sleep(float $seconds): void
    {
        if ($this->sleeper instanceof \Closure) {
            ($this->sleeper)($seconds);

            return;
        }

        if ($seconds > 0) {
            usleep((int) round($seconds * 1_000_000));
        }
    }

    /**
     * The response's status, or null when the transport's response type does
     * not report one.
     *
     * @param  TResponse  $response
     */
    private function statusOf(mixed $response): ?int
    {
        if (!is_object($response) || !method_exists($response, 'status')) {
            return null;
        }

        $status = $response->status();

        return is_int($status) ? $status : null;
    }

    /**
     * The `Retry-After` delay in seconds, from either the delta-seconds or the
     * HTTP-date form, or null when the header is absent or unparseable.
     *
     * @param  TResponse  $response
     */
    private function retryAfterOf(mixed $response): ?float
    {
        if (!is_object($response) || !method_exists($response, 'header')) {
            return null;
        }

        $value = $response->header('Retry-After');
        if (!is_string($value) || trim($value) === '') {
            return null;
        }

        $value = trim($value);

        if (preg_match('/^\d+(\.\d+)?$/', $value) === 1) {
            return (float) $value;
        }

        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return null;
        }

        return max((float) ($timestamp - time()), 0.0);
    }
}
