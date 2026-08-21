<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pull Request Simple
 * @link https://docs.github.com/
 */
class PullRequestSimple
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $diff_url */
    public const diff_url = 'diff_url';
    #[Describe(['nullable' => true])]
    public ?string $diff_url = null;

    /** @see $patch_url */
    public const patch_url = 'patch_url';
    #[Describe(['nullable' => true])]
    public ?string $patch_url = null;

    /** @see $issue_url */
    public const issue_url = 'issue_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_url = null;

    /** @see $commits_url */
    public const commits_url = 'commits_url';
    #[Describe(['nullable' => true])]
    public ?string $commits_url = null;

    /** @see $review_comments_url */
    public const review_comments_url = 'review_comments_url';
    #[Describe(['nullable' => true])]
    public ?string $review_comments_url = null;

    /** @see $review_comment_url */
    public const review_comment_url = 'review_comment_url';
    #[Describe(['nullable' => true])]
    public ?string $review_comment_url = null;

    /** @see $comments_url */
    public const comments_url = 'comments_url';
    #[Describe(['nullable' => true])]
    public ?string $comments_url = null;

    /** @see $statuses_url */
    public const statuses_url = 'statuses_url';
    #[Describe(['nullable' => true])]
    public ?string $statuses_url = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $locked */
    public const locked = 'locked';
    #[Describe(['nullable' => true])]
    public ?bool $locked = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, PullRequestSimpleLabelsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PullRequestSimpleLabelsItem::class,
        'default' => [],
    ])]
    public array $labels;

    /** @see $milestone */
    public const milestone = 'milestone';
    #[Describe(['nullable' => true])]
    public ?Milestone $milestone = null;

    /** @see $active_lock_reason */
    public const active_lock_reason = 'active_lock_reason';
    #[Describe(['nullable' => true])]
    public ?string $active_lock_reason = null;

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

    /** @see $merged_at */
    public const merged_at = 'merged_at';
    #[Describe(['nullable' => true])]
    public ?string $merged_at = null;

    /** @see $merge_commit_sha */
    public const merge_commit_sha = 'merge_commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $merge_commit_sha = null;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assignee = null;

    /** @see $assignees */
    public const assignees = 'assignees';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $assignees;

    /** @see $requested_reviewers */
    public const requested_reviewers = 'requested_reviewers';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $requested_reviewers;

    /** @see $requested_teams */
    public const requested_teams = 'requested_teams';
    /** @var array<int, Team> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Team::class,
        'default' => [],
    ])]
    public array $requested_teams;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?PullRequestSimpleHead $head = null;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?PullRequestSimpleBase $base = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?PullRequestSimpleLinks $links = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['default' => AuthorAssociation::unknown])]
    public AuthorAssociation $author_association;

    /** @see $auto_merge */
    public const auto_merge = 'auto_merge';
    #[Describe(['nullable' => true])]
    public ?AutoMerge $auto_merge = null;

    /** @see $stack */
    public const stack = 'stack';
    #[Describe(['nullable' => true])]
    public ?PullRequestStack $stack = null;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;
}
