<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecretScanningPushProtectionBypass
{
    use DataModel;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?SecretScanningPushProtectionBypassReason $reason = null;

    /** @see $expire_at */
    public const expire_at = 'expire_at';
    #[Describe(['nullable' => true])]
    public ?string $expire_at = null;

    /** @see $token_type */
    public const token_type = 'token_type';
    #[Describe(['nullable' => true])]
    public ?string $token_type = null;
}
