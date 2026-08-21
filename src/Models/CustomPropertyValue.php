<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Custom property name and associated value
 * @link https://docs.github.com/
 */
class CustomPropertyValue
{
    use DataModel;

    /** @see $property_name */
    public const property_name = 'property_name';
    #[Describe(['nullable' => true])]
    public ?string $property_name = null;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public string|array|null $value = null;
}
