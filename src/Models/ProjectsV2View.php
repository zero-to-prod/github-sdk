<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A view inside a projects v2 project
 * @link https://docs.github.com/
 */
class ProjectsV2View
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $layout */
    public const layout = 'layout';
    #[Describe(['default' => ProjectsV2ViewLayout::unknown])]
    public ProjectsV2ViewLayout $layout;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $project_url */
    public const project_url = 'project_url';
    #[Describe(['nullable' => true])]
    public ?string $project_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

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

    /** @see $filter */
    public const filter = 'filter';
    #[Describe(['nullable' => true])]
    public ?string $filter = null;

    /** @see $visible_fields */
    public const visible_fields = 'visible_fields';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $visible_fields;

    /** @see $sort_by */
    public const sort_by = 'sort_by';
    /** @var array<int, array<int, int|string>> */
    #[Describe(['default' => []])]
    public array $sort_by;

    /** @see $group_by */
    public const group_by = 'group_by';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $group_by;

    /** @see $vertical_group_by */
    public const vertical_group_by = 'vertical_group_by';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $vertical_group_by;
}
