<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details about why an issue comment was minimized.
 * @link https://docs.github.com/
 */
class NullableIssueCommentMinimized
{
    use DataModel;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;
}
