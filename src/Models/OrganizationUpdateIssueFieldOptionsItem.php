<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class OrganizationUpdateIssueFieldOptionsItem
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $color */
    public const color = 'color';
    #[Describe(['default' => IssueTypeColor::unknown])]
    public IssueTypeColor $color;

    /** @see $priority */
    public const priority = 'priority';
    #[Describe(['nullable' => true])]
    public ?int $priority = null;
}
