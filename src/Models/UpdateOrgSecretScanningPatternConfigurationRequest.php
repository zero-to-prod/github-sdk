<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgSecretScanningPatternConfigurationRequest
{
    use DataModel;

    /** @see $pattern_config_version */
    public const pattern_config_version = 'pattern_config_version';
    #[Describe(['nullable' => true])]
    public ?string $pattern_config_version = null;

    /** @see $provider_pattern_settings */
    public const provider_pattern_settings = 'provider_pattern_settings';
    /** @var array<int, UpdateOrgSecretScanningPatternConfigurationRequestProviderPatternSettingsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateOrgSecretScanningPatternConfigurationRequestProviderPatternSettingsItem::class,
        'default' => [],
    ])]
    public array $provider_pattern_settings;

    /** @see $custom_pattern_settings */
    public const custom_pattern_settings = 'custom_pattern_settings';
    /** @var array<int, UpdateOrgSecretScanningPatternConfigurationRequestCustomPatternSettingsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateOrgSecretScanningPatternConfigurationRequestCustomPatternSettingsItem::class,
        'default' => [],
    ])]
    public array $custom_pattern_settings;
}
