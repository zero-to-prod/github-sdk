<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListAgentRepoTasksResponse
{
    use DataModel;

    /** @see $tasks */
    public const tasks = 'tasks';
    /** @var array<int, ListAgentRepoTasksResponseTasksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ListAgentRepoTasksResponseTasksItem::class,
        'default' => [],
    ])]
    public array $tasks;

    /** @see $total_active_count */
    public const total_active_count = 'total_active_count';
    #[Describe(['nullable' => true])]
    public ?int $total_active_count = null;

    /** @see $total_archived_count */
    public const total_archived_count = 'total_archived_count';
    #[Describe(['nullable' => true])]
    public ?int $total_archived_count = null;
}
