<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * API Insights usage summary stats for an organization
 * @link https://docs.github.com/
 */
class ApiInsightsSummaryStats
{
    use DataModel;

    /** @see $total_request_count */
    public const total_request_count = 'total_request_count';
    #[Describe(['nullable' => true])]
    public ?int $total_request_count = null;

    /** @see $rate_limited_request_count */
    public const rate_limited_request_count = 'rate_limited_request_count';
    #[Describe(['nullable' => true])]
    public ?int $rate_limited_request_count = null;
}
