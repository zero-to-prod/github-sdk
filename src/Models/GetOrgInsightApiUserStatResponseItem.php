<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetOrgInsightApiUserStatResponseItem
{
    use DataModel;

    /** @see $actor_type */
    public const actor_type = 'actor_type';
    #[Describe(['nullable' => true])]
    public ?string $actor_type = null;

    /** @see $actor_name */
    public const actor_name = 'actor_name';
    #[Describe(['nullable' => true])]
    public ?string $actor_name = null;

    /** @see $actor_id */
    public const actor_id = 'actor_id';
    #[Describe(['nullable' => true])]
    public ?int $actor_id = null;

    /** @see $integration_id */
    public const integration_id = 'integration_id';
    #[Describe(['nullable' => true])]
    public ?int $integration_id = null;

    /** @see $oauth_application_id */
    public const oauth_application_id = 'oauth_application_id';
    #[Describe(['nullable' => true])]
    public ?int $oauth_application_id = null;

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
