<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

/**
 * HTTP transport interface. Implement this to use a custom HTTP client.
 * TResponse determines the return type of all SdkApi HTTP methods.
 *
 * @template TResponse
 */
interface HttpTransport
{
    /**
     * Send an HTTP request. The $options array follows Guzzle conventions.
     *
     * @param  string  $method   HTTP method (GET, POST, DELETE, etc.)
     * @param  string  $url      Fully qualified URL
     * @param  array<string, mixed>  $options  Guzzle-compatible options:
     *                           - form_params: array (application/x-www-form-urlencoded body)
     *                           - json: array (application/json body)
     *                           - headers: array (request headers)
     *                           - timeout: int (seconds)
     *                           - query: array (query string parameters)
     *                           - curl: array (native CURLOPT_* options, CurlHttpTransport only)
     * @return TResponse
     */
    public function request(string $method, string $url, array $options = []): mixed;
}
