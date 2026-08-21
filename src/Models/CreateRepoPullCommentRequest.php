<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullCommentRequest
{
    use DataModel;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $position */
    public const position = 'position';
    #[Describe(['nullable' => true])]
    public ?int $position = null;

    /** @see $side */
    public const side = 'side';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentStartSide $side = null;

    /** @see $line */
    public const line = 'line';
    #[Describe(['nullable' => true])]
    public ?int $line = null;

    /** @see $start_line */
    public const start_line = 'start_line';
    #[Describe(['nullable' => true])]
    public ?int $start_line = null;

    /** @see $start_side */
    public const start_side = 'start_side';
    #[Describe(['nullable' => true])]
    public ?CreateRepoPullCommentRequestStartSide $start_side = null;

    /** @see $in_reply_to */
    public const in_reply_to = 'in_reply_to';
    #[Describe(['nullable' => true])]
    public ?int $in_reply_to = null;

    /** @see $subject_type */
    public const subject_type = 'subject_type';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentSubjectType $subject_type = null;
}
