<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents a 'discussion_comment' secret scanning location type. This
 * location type shows that a secret was detected in a comment on a
 * discussion.
 * @link https://docs.github.com/
 */
class SecretScanningLocationDiscussionComment
{
    use DataModel;

    /** @see $discussion_comment_url */
    public const discussion_comment_url = 'discussion_comment_url';
    #[Describe(['nullable' => true])]
    public ?string $discussion_comment_url = null;
}
