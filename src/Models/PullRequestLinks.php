<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestLinks
{
    use DataModel;

    /** @see $comments */
    public const comments = 'comments';
    #[Describe(['nullable' => true])]
    public ?Link $comments = null;

    /** @see $commits */
    public const commits = 'commits';
    #[Describe(['nullable' => true])]
    public ?Link $commits = null;

    /** @see $statuses */
    public const statuses = 'statuses';
    #[Describe(['nullable' => true])]
    public ?Link $statuses = null;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?Link $html = null;

    /** @see $issue */
    public const issue = 'issue';
    #[Describe(['nullable' => true])]
    public ?Link $issue = null;

    /** @see $review_comments */
    public const review_comments = 'review_comments';
    #[Describe(['nullable' => true])]
    public ?Link $review_comments = null;

    /** @see $review_comment */
    public const review_comment = 'review_comment';
    #[Describe(['nullable' => true])]
    public ?Link $review_comment = null;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?Link $self = null;
}
