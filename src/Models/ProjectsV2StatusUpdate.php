<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An status update belonging to a project
 * @link https://docs.github.com/
 */
class ProjectsV2StatusUpdate
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?float $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $project_node_id */
    public const project_node_id = 'project_node_id';
    #[Describe(['nullable' => true])]
    public ?string $project_node_id = null;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?NullableProjectsV2StatusUpdateStatus $status = null;

    /** @see $start_date */
    public const start_date = 'start_date';
    #[Describe(['nullable' => true])]
    public ?string $start_date = null;

    /** @see $target_date */
    public const target_date = 'target_date';
    #[Describe(['nullable' => true])]
    public ?string $target_date = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;
}
