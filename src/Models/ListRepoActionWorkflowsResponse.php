<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoActionWorkflowsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $workflows */
    public const workflows = 'workflows';
    /** @var array<int, Workflow> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Workflow::class,
        'default' => [],
    ])]
    public array $workflows;
}
