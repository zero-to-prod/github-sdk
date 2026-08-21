<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\Sdk\Internal\DataModel;
use Zerotoprod\Sdk\Internal\HttpMethod;

/**
 * Immutable snapshot of a single HTTP request as it moves through the client
 * lifecycle. Passed to every hook registered on {@see SdkApi}.
 *
 * During the `before` phase `$response` is null and a hook may return a copy
 * to alter the outgoing request. During the
 * `after` phase `$response` holds the transport result. During the
 * `onException` phase `$response` is null and the request failed.
 *
 * @template TResponse
 */
class HookContext
{
    use DataModel;

    /** @see $Hook */
    public const Hook = 'Hook';
    /**
     * Lifecycle phase this context represents.
     */
    public readonly Hook $Hook;

    /** see $HttpMethod */
    public const HttpMethod = 'HttpMethod';
    /**
     * HTTP method (GET, POST, DELETE, etc.).
     */
    public readonly HttpMethod $HttpMethod;

    /** @see $url */
    public const url = 'url';
    /**
     * Fully qualified request URL.
     */
    public readonly string $url;

    /** @see $options */
    public const options = 'options';
    /**
     * Guzzle-compatible request options.
     *
     * @var array<string, mixed>
     */
    #[Describe(['default' => []])]
    public readonly array $options;

    /** @see $response */
    public const response = 'response';
    /**
     * Transport response; null outside the `after` phase.
     *
     * @var TResponse|null
     */
    #[Describe(['nullable' => true])]
    public readonly mixed $response;

    /**
     * Header names whose values {@see redacted()} masks.
     *
     * Matched case-insensitively: an exact name, or any name containing one of
     * the substrings — so `X-Api-Key` and `X-Refresh-Token` are covered without
     * being listed.
     */
    private const redact_headers = ['authorization', 'proxy-authorization', 'cookie', 'set-cookie'];
    private const redact_fragments = ['token', 'secret', 'password', 'api-key', 'api_key', 'apikey'];

    /**
     * A copy of this context with `$headers` added to the outgoing request.
     *
     * Use this from a `before` hook instead of rebuilding `options` by hand.
     * Spreading the options array and assigning `Options::headers` replaces
     * every header already on the request — including the ones a caller passed
     * for this one call — which is the quiet way to break `Options::headers`
     * package-wide. This merges instead, and the headers passed here win on a
     * name collision.
     *
     *     Hook::before->value => fn (HookContext $ctx) => $ctx->withHeaders([
     *         'X-Trace-Id' => bin2hex(random_bytes(8)),
     *     ]);
     *
     * @param  array<string, string>  $headers
     *
     * @return self<TResponse>
     */
    public function withHeaders(array $headers): self
    {
        /** @var array<string, string> $current */
        $current = $this->options[Options::headers] ?? [];

        /** @var self<TResponse> $context */
        $context = self::from([
            ...$this->toArray(),
            self::options => [
                ...$this->options,
                Options::headers => [...$current, ...$headers],
            ],
        ]);

        return $context;
    }

    /**
     * A copy of this context with `$options` merged into the outgoing request
     * options, leaving every other option in place.
     *
     * @param  array<string, mixed>  $options
     *
     * @return self<TResponse>
     */
    public function withOptions(array $options): self
    {
        /** @var self<TResponse> $context */
        $context = self::from([
            ...$this->toArray(),
            self::options => [...$this->options, ...$options],
        ]);

        return $context;
    }

    /**
     * This context as an array with sensitive header values masked — what a
     * logging hook should record.
     *
     * {@see toArray()} is the mutation primitive and therefore never redacts:
     * whatever it returns is what gets sent, so masking there would put
     * `***` on the wire. Log this instead.
     *
     *     Hook::before->value => fn (HookContext $ctx) => Log::debug('Outgoing', $ctx->redacted());
     *
     * @return array<string, mixed>
     */
    public function redacted(): array
    {
        $data = $this->toArray();

        /** @var array<string, mixed> $options */
        $options = is_array($data[self::options] ?? null) ? $data[self::options] : [];

        if (!is_array($options[Options::headers] ?? null)) {
            return $data;
        }

        /** @var array<string, string> $headers */
        $headers = $options[Options::headers];

        foreach (array_keys($headers) as $name) {
            if ($this->isSensitive((string) $name)) {
                $headers[$name] = '***';
            }
        }

        $options[Options::headers] = $headers;
        $data[self::options] = $options;

        return $data;
    }

    /**
     * Whether a header name names a credential.
     */
    private function isSensitive(string $name): bool
    {
        $name = strtolower($name);

        if (in_array($name, self::redact_headers, true)) {
            return true;
        }

        foreach (self::redact_fragments as $fragment) {
            if (str_contains($name, $fragment)) {
                return true;
            }
        }

        return false;
    }
}
