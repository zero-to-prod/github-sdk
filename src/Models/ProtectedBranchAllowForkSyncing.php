<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Whether users can pull changes from upstream when the branch is locked.
 * Set to `true` to allow fork syncing. Set to `false` to prevent fork
 * syncing.
 * @link https://docs.github.com/
 */
class ProtectedBranchAllowForkSyncing
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;
}
