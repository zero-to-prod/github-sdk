<?php

namespace Zerotoprod\GitHubSdk;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * Laravel Http facade transport. Returns Illuminate\Http\Client\Response objects.
 * Compatible with Http::fake() and all Laravel HTTP testing tools.
 *
 * @implements HttpTransport<Response>
 */
class LaravelHttpTransport implements HttpTransport
{
    /**
     * Prepended to request URLs when `GitHubSdkConfig::url` is empty, so
     * the URL reaching Laravel/Guzzle is always well-formed. Reference this
     * constant in `Http::fake()` keys to stub the default base.
     */
    public const default_host = 'http://localhost';

    /**
     * Send an HTTP request via Laravel's Http facade.
     *
     * @param  array<string, mixed>  $options
     */
    public function request(string $method, string $url, array $options = []): Response
    {
        // When GitHubSdkConfig::url is empty (typical in Http::fake() tests),
        // the URL is just a path. Laravel/Guzzle strips the leading slash, leaving
        // asserts brittle. Prefix a sentinel host so the URL is always well-formed.
        if (!preg_match('#^https?://#', $url)) {
            $url = self::default_host . (str_starts_with($url, '/') ? $url : '/' . $url);
        }

        if (isset($options[Options::query]) && is_array($options[Options::query])) {
            $url .= (str_contains($url, '?') ? '&' : '?') . http_build_query($options[Options::query]);
        }

        $timeout = isset($options['timeout']) && is_int($options['timeout']) ? $options['timeout'] : 30;
        $request = Http::timeout($timeout);

        if (isset($options[Options::headers]) && is_array($options[Options::headers])) {
            $request = $request->withHeaders($options[Options::headers]);
        }

        $data = [];
        if (isset($options['form_params'])) {
            $request = $request->asForm();
            $data = $options['form_params'];
        } elseif (isset($options['json'])) {
            $data = $options['json'];
        }

        return $data !== []
            ? $request->{strtolower($method)}($url, $data)
            : $request->{strtolower($method)}($url);
    }
}
