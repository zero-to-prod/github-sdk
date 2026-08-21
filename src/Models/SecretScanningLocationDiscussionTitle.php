<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents a 'discussion_title' secret scanning location type. This
 * location type shows that a secret was detected in the title of a
 * discussion.
 * @link https://docs.github.com/
 */
class SecretScanningLocationDiscussionTitle
{
    use DataModel;

    /** @see $discussion_title_url */
    public const discussion_title_url = 'discussion_title_url';
    #[Describe(['nullable' => true])]
    public ?string $discussion_title_url = null;
}
