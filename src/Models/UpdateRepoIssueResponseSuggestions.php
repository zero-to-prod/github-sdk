<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pending suggestions for each suggestible field (`type`,
 * `issue_field_values`, `labels`, `assignees`, `state`) the request touched.
 * Omitted for fields not in the request or with no pending or ignored
 * suggestions. Items tagged `ignored` are echoes of the current request's
 * inputs that were not persisted as pending suggestions.
 * @link https://docs.github.com/
 */
class UpdateRepoIssueResponseSuggestions
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    /** @var array<int, UpdateRepoIssueResponseSuggestionsTypeItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoIssueResponseSuggestionsTypeItem::class,
        'default' => [],
    ])]
    public array $type;

    /** @see $issue_field_values */
    public const issue_field_values = 'issue_field_values';
    /** @var array<int, UpdateRepoIssueResponseSuggestionsIssueFieldValuesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoIssueResponseSuggestionsIssueFieldValuesItem::class,
        'default' => [],
    ])]
    public array $issue_field_values;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, UpdateRepoIssueResponseSuggestionsLabelsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoIssueResponseSuggestionsLabelsItem::class,
        'default' => [],
    ])]
    public array $labels;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, UpdateRepoIssueResponseSuggestionsAssigneesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoIssueResponseSuggestionsAssigneesItem::class,
        'default' => [],
    ])]
    public array $assignees;

    /** @see $state */
    public const state = 'state';
    /** @var array<int, UpdateRepoIssueResponseSuggestionsStateItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoIssueResponseSuggestionsStateItem::class,
        'default' => [],
    ])]
    public array $state;
}
