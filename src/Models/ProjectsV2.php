<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A projects v2 project
 * @link https://docs.github.com/
 */
class ProjectsV2
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

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $public */
    public const public = 'public';
    #[Describe(['nullable' => true])]
    public ?bool $public = null;

    /** @see $closed_at */
    public const closed_at = 'closed_at';
    #[Describe(['nullable' => true])]
    public ?string $closed_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $short_description */
    public const short_description = 'short_description';
    #[Describe(['nullable' => true])]
    public ?string $short_description = null;

    /** @see $deleted_at */
    public const deleted_at = 'deleted_at';
    #[Describe(['nullable' => true])]
    public ?string $deleted_at = null;

    /** @see $deleted_by */
    public const deleted_by = 'deleted_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $deleted_by = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?NullableMilestoneState $state = null;

    /** @see $latest_status_update */
    public const latest_status_update = 'latest_status_update';
    #[Describe(['nullable' => true])]
    public ?ProjectsV2StatusUpdate $latest_status_update = null;

    /** @see $is_template */
    public const is_template = 'is_template';
    #[Describe(['nullable' => true])]
    public ?bool $is_template = null;
}
