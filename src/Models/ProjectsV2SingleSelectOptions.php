<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An option for a single select field
 * @link https://docs.github.com/
 */
class ProjectsV2SingleSelectOptions
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?ProjectsV2SingleSelectOptionsName $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?ProjectsV2SingleSelectOptionsDescription $description = null;

    /** @see $color */
    public const color = 'color';
    #[Describe(['nullable' => true])]
    public ?string $color = null;
}
