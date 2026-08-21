<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Comments provide a way for people to collaborate on an issue.
 * @link https://docs.github.com/
 */
class IssueComment
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

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $body_text */
    public const body_text = 'body_text';
    #[Describe(['nullable' => true])]
    public ?string $body_text = null;

    /** @see $body_html */
    public const body_html = 'body_html';
    #[Describe(['nullable' => true])]
    public ?string $body_html = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $issue_url */
    public const issue_url = 'issue_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_url = null;

    /** @see $author_association */
    public const author_association = 'author_association';
    #[Describe(['nullable' => true])]
    public ?AuthorAssociation $author_association = null;

    /** @see $performed_via_github_app */
    public const performed_via_github_app = 'performed_via_github_app';
    #[Describe(['nullable' => true])]
    public ?Integration $performed_via_github_app = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?ReactionRollup $reactions = null;

    /** @see $pin */
    public const pin = 'pin';
    #[Describe(['nullable' => true])]
    public ?NullablePinnedIssueComment $pin = null;

    /** @see $minimized */
    public const minimized = 'minimized';
    #[Describe(['nullable' => true])]
    public ?NullableIssueCommentMinimized $minimized = null;
}
