<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Context around who pinned an issue comment and when it was pinned.
 * @link https://docs.github.com/
 */
class NullablePinnedIssueComment
{
    use DataModel;

    /** @see $pinned_at */
    public const pinned_at = 'pinned_at';
    #[Describe(['nullable' => true])]
    public ?string $pinned_at = null;

    /** @see $pinned_by */
    public const pinned_by = 'pinned_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $pinned_by = null;
}
