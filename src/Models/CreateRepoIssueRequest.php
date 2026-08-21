<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoIssueRequest
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public string|int|null $title = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?string $assignee = null;

    /** @see $milestone */
    public const milestone = 'milestone';
    #[Describe(['nullable' => true])]
    public string|int|null $milestone = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $labels;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $assignees;

    /** @see $issue_field_values */
    public const issue_field_values = 'issue_field_values';
    /** @var array<int, CreateRepoIssueRequestIssueFieldValuesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateRepoIssueRequestIssueFieldValuesItem::class,
        'default' => [],
    ])]
    public array $issue_field_values;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;
}
