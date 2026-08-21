<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class WorkflowRunUsageBillable
{
    use DataModel;

    /** @see $UBUNTU */
    public const UBUNTU = 'UBUNTU';
    #[Describe(['nullable' => true])]
    public ?WorkflowRunUsageBillableUBUNTU $UBUNTU = null;

    /** @see $MACOS */
    public const MACOS = 'MACOS';
    #[Describe(['nullable' => true])]
    public ?WorkflowRunUsageBillableMACOS $MACOS = null;

    /** @see $WINDOWS */
    public const WINDOWS = 'WINDOWS';
    #[Describe(['nullable' => true])]
    public ?WorkflowRunUsageBillableWINDOWS $WINDOWS = null;
}
