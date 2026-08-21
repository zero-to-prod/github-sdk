<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgPropertyValueRequest
{
    use DataModel;

    /** @see $repository_names */
    public const repository_names = 'repository_names';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $repository_names;

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
