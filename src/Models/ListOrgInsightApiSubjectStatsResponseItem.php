<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgInsightApiSubjectStatsResponseItem
{
    use DataModel;

    /** @see $subject_type */
    public const subject_type = 'subject_type';
    #[Describe(['nullable' => true])]
    public ?string $subject_type = null;

    /** @see $subject_name */
    public const subject_name = 'subject_name';
    #[Describe(['nullable' => true])]
    public ?string $subject_name = null;

    /** @see $subject_id */
    public const subject_id = 'subject_id';
    #[Describe(['nullable' => true])]
    public ?int $subject_id = null;

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
