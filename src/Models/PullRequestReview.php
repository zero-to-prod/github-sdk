<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pull Request Reviews are reviews on pull requests.
 * @link https://docs.github.com/
 */
class PullRequestReview
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

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

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
    public ?PullRequestReviewLinks $links = null;

    /** @see $submitted_at */
    public const submitted_at = 'submitted_at';
    #[Describe(['nullable' => true])]
    public ?string $submitted_at = null;

    /** @see $commit_id */
    public const commit_id = 'commit_id';
    #[Describe(['nullable' => true])]
    public ?string $commit_id = null;

    /** @see $body_html */
    public const body_html = 'body_html';
    #[Describe(['nullable' => true])]
    public ?string $body_html = null;

    /** @see $body_text */
    public const body_text = 'body_text';
    #[Describe(['nullable' => true])]
    public ?string $body_text = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['default' => AuthorAssociation::unknown])]
    public AuthorAssociation $author_association;
}
