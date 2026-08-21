<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Issue Search Result Item
 * @link https://docs.github.com/
 */
class IssueSearchResultItem
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $labels_url */
    public const labels_url = 'labels_url';
    #[Describe(['nullable' => true])]
    public ?string $labels_url = null;

    /** @see $comments_url */
    public const comments_url = 'comments_url';
    #[Describe(['nullable' => true])]
    public ?string $comments_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $locked */
    public const locked = 'locked';
    #[Describe(['nullable' => true])]
    public ?bool $locked = null;

    /** @see $active_lock_reason */
    public const active_lock_reason = 'active_lock_reason';
    #[Describe(['nullable' => true])]
    public ?string $active_lock_reason = null;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $assignees;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, IssueSearchResultItemLabelsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => IssueSearchResultItemLabelsItem::class,
        'default' => [],
    ])]
    public array $labels;

    /** @see $sub_issues_summary */
    public const sub_issues_summary = 'sub_issues_summary';
    #[Describe(['nullable' => true])]
    public ?SubIssuesSummary $sub_issues_summary = null;

    /** @see $issue_dependencies_summary */
    public const issue_dependencies_summary = 'issue_dependencies_summary';
    #[Describe(['nullable' => true])]
    public ?IssueDependenciesSummary $issue_dependencies_summary = null;

    /** @see $issue_field_values */
    public const issue_field_values = 'issue_field_values';
    /** @var array<int, IssueFieldValue> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => IssueFieldValue::class,
        'default' => [],
    ])]
    public array $issue_field_values;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $state_reason */
    public const state_reason = 'state_reason';
    #[Describe(['nullable' => true])]
    public ?string $state_reason = null;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assignee = null;

    /** @see $milestone */
    public const milestone = 'milestone';
    #[Describe(['nullable' => true])]
    public ?Milestone $milestone = null;

    /** @see $comments */
    public const comments = 'comments';
    #[Describe(['nullable' => true])]
    public ?int $comments = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $closed_at */
    public const closed_at = 'closed_at';
    #[Describe(['nullable' => true])]
    public ?string $closed_at = null;

    /** @see $text_matches */
    public const text_matches = 'text_matches';
    /** @var array<int, SearchResultTextMatchesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SearchResultTextMatchesItem::class,
        'default' => [],
    ])]
    public array $text_matches;

    /** @see $pull_request */
    public const pull_request = 'pull_request';
    #[Describe(['nullable' => true])]
    public ?IssueSearchResultItemPullRequest $pull_request = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['default' => AuthorAssociation::unknown])]
    public AuthorAssociation $author_association;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?Repository $repository = null;

    /** @see $body_html */
    public const body_html = 'body_html';
    #[Describe(['nullable' => true])]
    public ?string $body_html = null;

    /** @see $body_text */
    public const body_text = 'body_text';
    #[Describe(['nullable' => true])]
    public ?string $body_text = null;

    /** @see $timeline_url */
    public const timeline_url = 'timeline_url';
    #[Describe(['nullable' => true])]
    public ?string $timeline_url = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?IssueType $type = null;

    /** @see $performed_via_github_app */
    public const performed_via_github_app = 'performed_via_github_app';
    #[Describe(['nullable' => true])]
    public ?Integration $performed_via_github_app = null;

    /** @see $pinned_comment */
    public const pinned_comment = 'pinned_comment';
    #[Describe(['nullable' => true])]
    public ?IssueComment $pinned_comment = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?ReactionRollup $reactions = null;
}
