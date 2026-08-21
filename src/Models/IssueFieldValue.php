<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A value assigned to an issue field
 * @link https://docs.github.com/
 */
class IssueFieldValue
{
    use DataModel;

    /** @see $issue_field_id */
    public const issue_field_id = 'issue_field_id';
    #[Describe(['nullable' => true])]
    public ?int $issue_field_id = null;

    /** @see $issue_field_name */
    public const issue_field_name = 'issue_field_name';
    #[Describe(['nullable' => true])]
    public ?string $issue_field_name = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $data_type */
    public const data_type = 'data_type';
    #[Describe(['default' => IssueFieldValueDataType::unknown])]
    public IssueFieldValueDataType $data_type;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public string|float|int|null $value = null;

    /** @see $single_select_option */
    public const single_select_option = 'single_select_option';
    #[Describe(['nullable' => true])]
    public ?IssueFieldValueSingleSelectOption $single_select_option = null;

    /** @see $multi_select_options */
    public const multi_select_options = 'multi_select_options';
    /** @var array<int, IssueFieldValueMultiSelectOptionsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => IssueFieldValueMultiSelectOptionsItem::class,
        'default' => [],
    ])]
    public array $multi_select_options;
}
