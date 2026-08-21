<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetOrgInsightApiTimeStatResponseItem
{
    use DataModel;

    /** @see $timestamp */
    public const timestamp = 'timestamp';
    #[Describe(['nullable' => true])]
    public ?string $timestamp = null;

    /** @see $total_request_count */
    public const total_request_count = 'total_request_count';
    #[Describe(['nullable' => true])]
    public ?int $total_request_count = null;

    /** @see $rate_limited_request_count */
    public const rate_limited_request_count = 'rate_limited_request_count';
    #[Describe(['nullable' => true])]
    public ?int $rate_limited_request_count = null;
}
