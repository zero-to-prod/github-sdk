<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestReviewCommentEventComment
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $pull_request_review_id */
    public const pull_request_review_id = 'pull_request_review_id';
    #[Describe(['nullable' => true])]
    public ?int $pull_request_review_id = null;

    /** @see $diff_hunk */
    public const diff_hunk = 'diff_hunk';
    #[Describe(['nullable' => true])]
    public ?string $diff_hunk = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $position */
    public const position = 'position';
    #[Describe(['nullable' => true])]
    public ?int $position = null;

    /** @see $original_position */
    public const original_position = 'original_position';
    #[Describe(['nullable' => true])]
    public ?int $original_position = null;

    /** @see $subject_type */
    public const subject_type = 'subject_type';
    #[Describe(['nullable' => true])]
    public ?string $subject_type = null;

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentEventCommentUser $user = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $pull_request_url */
    public const pull_request_url = 'pull_request_url';
    #[Describe(['nullable' => true])]
    public ?string $pull_request_url = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?PullRequestReviewCommentEventCommentLinks $links = null;

    /** @see $original_commit_id */
    public const original_commit_id = 'original_commit_id';
    #[Describe(['nullable' => true])]
    public ?string $original_commit_id = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentEventCommentReactions $reactions = null;

    /** @see $in_reply_to_id */
    public const in_reply_to_id = 'in_reply_to_id';
    #[Describe(['nullable' => true])]
    public ?int $in_reply_to_id = null;
}
