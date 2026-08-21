<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents a 'pull_request_comment' secret scanning location type. This
 * location type shows that a secret was detected in a comment on a pull
 * request.
 * @link https://docs.github.com/
 */
class SecretScanningLocationPullRequestComment
{
    use DataModel;

    /** @see $pull_request_comment_url */
    public const pull_request_comment_url = 'pull_request_comment_url';
    #[Describe(['nullable' => true])]
    public ?string $pull_request_comment_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;
}
