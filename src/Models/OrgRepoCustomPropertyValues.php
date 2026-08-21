<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * List of custom property values for a repository
 * @link https://docs.github.com/
 */
class OrgRepoCustomPropertyValues
{
    use DataModel;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $repository_name */
    public const repository_name = 'repository_name';
    #[Describe(['nullable' => true])]
    public ?string $repository_name = null;

    /** @see $repository_full_name */
    public const repository_full_name = 'repository_full_name';
    #[Describe(['nullable' => true])]
    public ?string $repository_full_name = null;

    /** @see $properties */
    public const properties = 'properties';
    /** @var array<int, CustomPropertyValue> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CustomPropertyValue::class,
        'default' => [],
    ])]
    public array $properties;
}
