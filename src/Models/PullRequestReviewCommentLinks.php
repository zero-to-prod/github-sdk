<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestReviewCommentLinks
{
    use DataModel;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentLinksSelf $self = null;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentLinksHtml $html = null;

    /** @see $pull_request */
    public const pull_request = 'pull_request';
    #[Describe(['nullable' => true])]
    public ?PullRequestReviewCommentLinksPullRequest $pull_request = null;
}
