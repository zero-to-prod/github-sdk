<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class WorkflowUsageBillableWINDOWS
{
    use DataModel;

    /** @see $total_ms */
    public const total_ms = 'total_ms';
    #[Describe(['nullable' => true])]
    public ?int $total_ms = null;
}
