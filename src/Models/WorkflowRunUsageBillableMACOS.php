<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class WorkflowRunUsageBillableMACOS
{
    use DataModel;

    /** @see $total_ms */
    public const total_ms = 'total_ms';
    #[Describe(['nullable' => true])]
    public ?int $total_ms = null;

    /** @see $jobs */
    public const jobs = 'jobs';
    #[Describe(['nullable' => true])]
    public ?int $jobs = null;

    /** @see $job_runs */
    public const job_runs = 'job_runs';
    /** @var array<int, WorkflowRunUsageBillableMACOSJobRunsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => WorkflowRunUsageBillableMACOSJobRunsItem::class,
        'default' => [],
    ])]
    public array $job_runs;
}
