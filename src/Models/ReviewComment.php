<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Legacy Review Comment
 * @link https://docs.github.com/
 */
class ReviewComment
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $pull_request_review_id */
    public const pull_request_review_id = 'pull_request_review_id';
    #[Describe(['nullable' => true])]
    public ?int $pull_request_review_id = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

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

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $original_commit_id */
    public const original_commit_id = 'original_commit_id';
    #[Describe(['nullable' => true])]
    public ?string $original_commit_id = null;

    /** @see $in_reply_to_id */
    public const in_reply_to_id = 'in_reply_to_id';
    #[Describe(['nullable' => true])]
    public ?int $in_reply_to_id = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

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

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['default' => AuthorAssociation::unknown])]
    public AuthorAssociation $author_association;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?ReviewCommentLinks $links = null;

    /** @see $body_text */
    public const body_text = 'body_text';
    #[Describe(['nullable' => true])]
    public ?string $body_text = null;

    /** @see $body_html */
    public const body_html = 'body_html';
    #[Describe(['nullable' => true])]
    public ?string $body_html = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?ReactionRollup $reactions = null;

    /** @see $side */
    public const side = 'side';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentStartSide $side = null;

    /** @see $start_side */
    public const start_side = 'start_side';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentStartSide $start_side = null;

    /** @see $line */
    public const line = 'line';
    #[Describe(['nullable' => true])]
    public ?int $line = null;

    /** @see $original_line */
    public const original_line = 'original_line';
    #[Describe(['nullable' => true])]
    public ?int $original_line = null;

    /** @see $start_line */
    public const start_line = 'start_line';
    #[Describe(['nullable' => true])]
    public ?int $start_line = null;

    /** @see $original_start_line */
    public const original_start_line = 'original_start_line';
    #[Describe(['nullable' => true])]
    public ?int $original_start_line = null;

    /** @see $subject_type */
    public const subject_type = 'subject_type';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentSubjectType $subject_type = null;
}
