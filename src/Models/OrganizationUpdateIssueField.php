<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class OrganizationUpdateIssueField
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?IssueFieldVisibility $visibility = null;

    /** @see $options */
    public const options = 'options';
    /** @var array<int, OrganizationUpdateIssueFieldOptionsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrganizationUpdateIssueFieldOptionsItem::class,
        'default' => [],
    ])]
    public array $options;
}
