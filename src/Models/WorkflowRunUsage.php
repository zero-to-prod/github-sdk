<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Workflow Run Usage
 * @link https://docs.github.com/
 */
class WorkflowRunUsage
{
    use DataModel;

    /** @see $billable */
    public const billable = 'billable';
    #[Describe(['nullable' => true])]
    public ?WorkflowRunUsageBillable $billable = null;

    /** @see $run_duration_ms */
    public const run_duration_ms = 'run_duration_ms';
    #[Describe(['nullable' => true])]
    public ?int $run_duration_ms = null;
}
