<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoActionRunsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $workflow_runs */
    public const workflow_runs = 'workflow_runs';
    /** @var array<int, WorkflowRun> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => WorkflowRun::class,
        'default' => [],
    ])]
    public array $workflow_runs;
}
