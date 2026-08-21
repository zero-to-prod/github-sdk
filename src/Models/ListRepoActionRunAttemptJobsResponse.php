<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoActionRunAttemptJobsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $jobs */
    public const jobs = 'jobs';
    /** @var array<int, Job> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Job::class,
        'default' => [],
    ])]
    public array $jobs;
}
