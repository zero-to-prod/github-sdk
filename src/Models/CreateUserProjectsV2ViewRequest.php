<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateUserProjectsV2ViewRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $layout */
    public const layout = 'layout';
    #[Describe(['default' => ProjectsV2ViewLayout::unknown])]
    public ProjectsV2ViewLayout $layout;

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
