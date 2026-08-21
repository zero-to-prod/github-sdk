<?php

namespace Zerotoprod\Sdk;

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
     * Decode the JSON body. Returns the full array when no key is given,
     * or a single value by key with an optional default.
     */
    public function json(?string $key = null, mixed $default = null): mixed
    {
        /** @var array<string, mixed> $data */
        $data = json_decode($this->body, true) ?? [];
        if ($key === null) {
            return $data;
        }
        return $data[$key] ?? $default;
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
