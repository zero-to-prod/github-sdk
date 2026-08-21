<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgSecretScanningPatternConfigurationRequestProviderPatternSettingsItem
{
    use DataModel;

    /** @see $token_type */
    public const token_type = 'token_type';
    #[Describe(['nullable' => true])]
    public ?string $token_type = null;

    /** @see $push_protection_setting */
    public const push_protection_setting = 'push_protection_setting';
    #[Describe(['nullable' => true])]
    public ?SecretScanningPatternOverrideEnterpriseSetting $push_protection_setting = null;
}
