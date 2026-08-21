<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A custom attribute defined at the organization level for attaching
 * structured data to issues.
 * @link https://docs.github.com/
 */
class IssueField
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

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
    /** @var array<int, IssueFieldOptionsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => IssueFieldOptionsItem::class,
        'default' => [],
    ])]
    public array $options;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
