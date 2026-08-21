<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Workflow Usage
 * @link https://docs.github.com/
 */
class WorkflowUsage
{
    use DataModel;

    /** @see $billable */
    public const billable = 'billable';
    #[Describe(['nullable' => true])]
    public ?WorkflowUsageBillable $billable = null;
}
