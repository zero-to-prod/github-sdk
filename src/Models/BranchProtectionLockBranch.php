<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Whether to set the branch as read-only. If this is true, users will not be
 * able to push to the branch.
 * @link https://docs.github.com/
 */
class BranchProtectionLockBranch
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;
}
