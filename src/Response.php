<?php

namespace Zerotoprod\GitHubSdk;

/**
 * Immutable HTTP response. Default return type when using CurlHttpTransport.
 */
class Response
{
    /**
     * @param  int                    $status   HTTP status code
     * @param  array<string, string>  $headers  Response headers
     * @param  string                 $body     Raw response body
     */
    public function __construct(
        public readonly int    $status,
        public readonly array  $headers,
        public readonly string $body,
    ) {}

    /**
     * Decode the JSON body. Returns the full decoded value when no key is
     * given, or a single value by key with an optional default.
     *
     * A body that does not decode at all yields `[]`. A body that decodes to a
     * scalar (`"ok"`, `42`) is returned as that scalar when no key is asked
     * for, but a keyed lookup on it yields `$default` rather than indexing into
     * a string.
     */
    public function json(?string $key = null, mixed $default = null): mixed
    {
        $data = json_decode($this->body, true) ?? [];

        if ($key === null) {
            return $data;
        }

        return is_array($data) ? ($data[$key] ?? $default) : $default;
    }

    /**
     * True when the status code is 2xx.
     */
    public function ok(): bool
    {
        return $this->status >= 200 && $this->status < 300;
    }

    /**
     * True when the status code is outside 2xx.
     */
    public function failed(): bool
    {
        return !$this->ok();
    }

    /**
     * Returns the HTTP status code.
     */
    public function status(): int
    {
        return $this->status;
    }

    /**
     * Get a response header by name (case-insensitive fallback).
     */
    public function header(string $key): ?string
    {
        return $this->headers[$key] ?? $this->headers[strtolower($key)] ?? null;
    }
}
