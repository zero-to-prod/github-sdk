<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueIssueFieldValueRequest
{
    use DataModel;

    /** @see $issue_field_values */
    public const issue_field_values = 'issue_field_values';
    /** @var array<int, CreateRepoIssueIssueFieldValueRequestIssueFieldValuesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateRepoIssueIssueFieldValueRequestIssueFieldValuesItem::class,
        'default' => [],
    ])]
    public array $issue_field_values;
}
