<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoSecretScanningPushProtectionBypassRequest
{
    use DataModel;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['default' => SecretScanningPushProtectionBypassReason::unknown])]
    public SecretScanningPushProtectionBypassReason $reason;

    /** @see $placeholder_id */
    public const placeholder_id = 'placeholder_id';
    #[Describe(['nullable' => true])]
    public ?string $placeholder_id = null;
}
