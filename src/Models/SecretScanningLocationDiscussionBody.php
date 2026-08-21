<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents a 'discussion_body' secret scanning location type. This
 * location type shows that a secret was detected in the body of a
 * discussion.
 * @link https://docs.github.com/
 */
class SecretScanningLocationDiscussionBody
{
    use DataModel;

    /** @see $discussion_body_url */
    public const discussion_body_url = 'discussion_body_url';
    #[Describe(['nullable' => true])]
    public ?string $discussion_body_url = null;
}
