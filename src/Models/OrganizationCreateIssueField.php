<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class OrganizationCreateIssueField
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

    /** @see $data_type */
    public const data_type = 'data_type';
    #[Describe(['default' => IssueFieldDataType::unknown])]
    public IssueFieldDataType $data_type;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?IssueFieldVisibility $visibility = null;

    /** @see $options */
    public const options = 'options';
    /** @var array<int, OrganizationCreateIssueFieldOptionsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrganizationCreateIssueFieldOptionsItem::class,
        'default' => [],
    ])]
    public array $options;
}
