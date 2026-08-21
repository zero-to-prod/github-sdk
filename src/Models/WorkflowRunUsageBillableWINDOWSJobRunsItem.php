<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class WorkflowRunUsageBillableWINDOWSJobRunsItem
{
    use DataModel;

    /** @see $job_id */
    public const job_id = 'job_id';
    #[Describe(['nullable' => true])]
    public ?int $job_id = null;

    /** @see $duration_ms */
    public const duration_ms = 'duration_ms';
    #[Describe(['nullable' => true])]
    public ?int $duration_ms = null;
}
