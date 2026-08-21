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
}
