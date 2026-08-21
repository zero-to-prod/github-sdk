<?php

namespace Zerotoprod\Sdk;

use RuntimeException;

/**
 * Default HTTP transport. Uses ext-curl with no framework dependencies.
 * Returns Response objects.
 *
 * @implements HttpTransport<Response>
 */
class CurlHttpTransport implements HttpTransport
{
    /**
     * Send an HTTP request via cURL. Throws RuntimeException on connection failure.
     *
     * @param  array<string, mixed>  $options
     */
    public function request(string $method, string $url, array $options = []): Response
    {
        $ch = curl_init();

        if (isset($options[Options::query]) && is_array($options[Options::query])) {
            $url .= (str_contains($url, '?') ? '&' : '?') . http_build_query($options[Options::query]);
        }

        $timeout = isset($options['timeout']) && is_int($options['timeout']) ? $options['timeout'] : 30;

        curl_setopt($ch, CURLOPT_URL, $url ?: '/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method) ?: 'GET');

        /** @var array<string, string> $headers */
        $headers = $options[Options::headers] ?? [];
        if (isset($options['form_params']) && is_array($options['form_params'])) {
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($options['form_params']));
        } elseif (isset($options['json'])) {
            $headers['Content-Type'] = 'application/json';
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($options['json']) ?: '');
        }

        if ($headers !== []) {
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array_map(static fn(string $k, string $v): string => "$k: $v", array_keys($headers), array_values($headers)),
            );
        }

        if (isset($options['curl']) && is_array($options['curl'])) {
            curl_setopt_array($ch, $options['curl']);
        }

        $response = curl_exec($ch);
        if (!is_string($response)) {
            throw new RuntimeException('cURL error: ' . curl_error($ch));
        }

        // No curl_close(): a no-op since PHP 8.0, deprecated in 8.5. The
        // CurlHandle is released when $ch goes out of scope.
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $status     = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return new Response(
            $status,
            $this->parseHeaders(substr($response, 0, $headerSize)),
            substr($response, $headerSize),
        );
    }

    /** @return array<string, string> */
    private function parseHeaders(string $raw): array
    {
        $headers = [];
        foreach (explode("\r\n", trim($raw)) as $line) {
            if (str_contains($line, ':')) {
                [$key, $value] = explode(':', $line, 2);
                $headers[trim($key)] = trim($value);
            }
        }
        return $headers;
    }
}
