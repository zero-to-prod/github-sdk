<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk;

use Zerotoprod\Sdk\Internal\DataModel;

/**
 * Option keys for the `$options` array accepted as the final argument of every
 * {@see SdkApi} method.
 *
 * These keys get special handling from the dispatcher before the request
 * reaches the transport; any other keys (`timeout`, `json`, `form_params`,
 * `curl`, …) follow Guzzle conventions and pass through to the transport
 * untouched. Prefer these constants over raw strings so call sites stay in
 * lockstep with the option names even if the underlying values change:
 *
 *     $api->listAccounts([
 *         Options::query   => [Query::where => ['status', 'active']],
 *         Options::headers => ['X-Request-Id' => $id],
 *     ]);
 *
 *     $response = $api->getAccount($id, [Options::raw => true]); // native response
 *
 * @link https://example.com/docs
 */
class Options
{
    use DataModel;

    /**
     * Skip `ApiResult` wrapping and return the transport's native response.
     *
     * Consumed by the dispatcher and never sent to the server: when `true`, the
     * hydrated {@see ApiResult} is bypassed and the raw transport response —
     * this package's {@see Response}, or a custom transport's own type — is
     * returned as-is. Useful when you want headers/status straight from the
     * wire, or when a transport returns a non-`Response` type.
     *
     *     $response = $api->getAccount($id, [Options::raw => true]);
     *     $response->status(); // 200
     *
     * @see SdkApi::__call() where the flag is read and stripped
     */
    public const raw = 'raw';

    /**
     * Ad-hoc query-string parameters appended to the request URL by every
     * transport.
     *
     * The value is run through {@see \Zerotoprod\Sdk\Internal\QueryNormalizer}
     * before being sent — build it with the {@see \Zerotoprod\Sdk\Models\Query}
     * DSL constants (`Query::where`, `Query::with`, `Query::fields`, …) for the
     * filtering and eager-loading shapes the service understands.
     *
     *     $api->listAccounts([Options::query => [
     *         Query::where => ['provider_id', 'fusionauth'],
     *         Query::with  => ['providers'],
     *     ]]);
     */
    public const query = 'query';

    /**
     * Per-request HTTP headers — a map of header name to value.
     *
     * Merged with any headers added by `before` lifecycle hooks, then forwarded
     * to the transport, which applies them to the outgoing request. Scope a
     * header to one call by passing it here rather than configuring it globally.
     *
     *     $api->getAccount($id, [Options::headers => ['X-Request-Id' => $id]]);
     */
    public const headers = 'headers';
}
