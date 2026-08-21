<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Custom property set payload
 * @link https://docs.github.com/
 */
class CustomPropertySetPayload
{
    use DataModel;

    /** @see $value_type */
    public const value_type = 'value_type';
    #[Describe(['default' => CustomPropertyValueType::unknown])]
    public CustomPropertyValueType $value_type;

    /** @see $required */
    public const required = 'required';
    #[Describe(['nullable' => true])]
    public ?bool $required = null;

    /** @see $default_value */
    public const default_value = 'default_value';
    #[Describe(['nullable' => true])]
    public string|array|null $default_value = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $allowed_values */
    public const allowed_values = 'allowed_values';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $allowed_values;

    /** @see $values_editable_by */
    public const values_editable_by = 'values_editable_by';
    #[Describe(['nullable' => true])]
    public ?CustomPropertyValuesEditableBy $values_editable_by = null;

    /** @see $require_explicit_values */
    public const require_explicit_values = 'require_explicit_values';
    #[Describe(['nullable' => true])]
    public ?bool $require_explicit_values = null;
}
