<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoIssueLockRequest
{
    use DataModel;

    /** @see $lock_reason */
    public const lock_reason = 'lock_reason';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoIssueLockRequestLockReason $lock_reason = null;
}
