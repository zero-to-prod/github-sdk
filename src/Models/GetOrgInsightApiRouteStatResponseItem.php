<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetOrgInsightApiRouteStatResponseItem
{
    use DataModel;

    /** @see $http_method */
    public const http_method = 'http_method';
    #[Describe(['nullable' => true])]
    public ?string $http_method = null;

    /** @see $api_route */
    public const api_route = 'api_route';
    #[Describe(['nullable' => true])]
    public ?string $api_route = null;

    /** @see $total_request_count */
    public const total_request_count = 'total_request_count';
    #[Describe(['nullable' => true])]
    public ?int $total_request_count = null;

    /** @see $rate_limited_request_count */
    public const rate_limited_request_count = 'rate_limited_request_count';
    #[Describe(['nullable' => true])]
    public ?int $rate_limited_request_count = null;

    /** @see $last_rate_limited_timestamp */
    public const last_rate_limited_timestamp = 'last_rate_limited_timestamp';
    #[Describe(['nullable' => true])]
    public ?string $last_rate_limited_timestamp = null;

    /** @see $last_request_timestamp */
    public const last_request_timestamp = 'last_request_timestamp';
    #[Describe(['nullable' => true])]
    public ?string $last_request_timestamp = null;
}
