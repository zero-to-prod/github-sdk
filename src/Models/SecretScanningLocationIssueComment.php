<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents an 'issue_comment' secret scanning location type. This location
 * type shows that a secret was detected in a comment on an issue.
 * @link https://docs.github.com/
 */
class SecretScanningLocationIssueComment
{
    use DataModel;

    /** @see $issue_comment_url */
    public const issue_comment_url = 'issue_comment_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_comment_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
