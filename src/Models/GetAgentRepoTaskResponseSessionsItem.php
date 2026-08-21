<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Full session details within a task
 * @link https://docs.github.com/
 */
class GetAgentRepoTaskResponseSessionsItem
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?GetAgentRepoTaskResponseSessionsItemUser $user = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?GetAgentRepoTaskResponseSessionsItemOwner $owner = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?GetAgentRepoTaskResponseSessionsItemRepository $repository = null;

    /** @see $task_id */
    public const task_id = 'task_id';
    #[Describe(['nullable' => true])]
    public ?string $task_id = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => ListAgentRepoTasksResponseTasksItemState::unknown])]
    public ListAgentRepoTasksResponseTasksItemState $state;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $prompt */
    public const prompt = 'prompt';
    #[Describe(['nullable' => true])]
    public ?string $prompt = null;

    /** @see $head_ref */
    public const head_ref = 'head_ref';
    #[Describe(['nullable' => true])]
    public ?string $head_ref = null;

    /** @see $base_ref */
    public const base_ref = 'base_ref';
    #[Describe(['nullable' => true])]
    public ?string $base_ref = null;

    /** @see $model */
    public const model = 'model';
    #[Describe(['nullable' => true])]
    public ?string $model = null;

    /** @see $usage */
    public const usage = 'usage';
    #[Describe(['nullable' => true])]
    public ?GetAgentRepoTaskResponseSessionsItemUsage $usage = null;

    /** @see $error */
    public const error = 'error';
    #[Describe(['nullable' => true])]
    public ?GetAgentRepoTaskResponseSessionsItemError $error = null;
}
