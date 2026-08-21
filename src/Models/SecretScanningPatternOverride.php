<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecretScanningPatternOverride
{
    use DataModel;

    /** @see $token_type */
    public const token_type = 'token_type';
    #[Describe(['nullable' => true])]
    public ?string $token_type = null;

    /** @see $custom_pattern_version */
    public const custom_pattern_version = 'custom_pattern_version';
    #[Describe(['nullable' => true])]
    public ?string $custom_pattern_version = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $alert_total */
    public const alert_total = 'alert_total';
    #[Describe(['nullable' => true])]
    public ?int $alert_total = null;

    /** @see $alert_total_percentage */
    public const alert_total_percentage = 'alert_total_percentage';
    #[Describe(['nullable' => true])]
    public ?int $alert_total_percentage = null;

    /** @see $false_positives */
    public const false_positives = 'false_positives';
    #[Describe(['nullable' => true])]
    public ?int $false_positives = null;

    /** @see $false_positive_rate */
    public const false_positive_rate = 'false_positive_rate';
    #[Describe(['nullable' => true])]
    public ?int $false_positive_rate = null;

    /** @see $bypass_rate */
    public const bypass_rate = 'bypass_rate';
    #[Describe(['nullable' => true])]
    public ?int $bypass_rate = null;

    /** @see $default_setting */
    public const default_setting = 'default_setting';
    #[Describe(['nullable' => true])]
    public ?SecretScanningPatternOverrideDefaultSetting $default_setting = null;

    /** @see $enterprise_setting */
    public const enterprise_setting = 'enterprise_setting';
    #[Describe(['nullable' => true])]
    public ?SecretScanningPatternOverrideEnterpriseSetting $enterprise_setting = null;

    /** @see $setting */
    public const setting = 'setting';
    #[Describe(['nullable' => true])]
    public ?SecretScanningPatternOverrideEnterpriseSetting $setting = null;
}
