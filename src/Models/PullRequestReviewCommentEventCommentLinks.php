<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestReviewCommentEventCommentLinks
{
    use DataModel;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentEventCommentLinksHtml $html = null;

    /** @see $pull_request */
    public const pull_request = 'pull_request';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentEventCommentLinksPullRequest $pull_request = null;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentEventCommentLinksSelf $self = null;
}
