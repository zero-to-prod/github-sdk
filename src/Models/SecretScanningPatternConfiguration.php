<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A collection of secret scanning patterns and their settings related to
 * push protection.
 * @link https://docs.github.com/
 */
class SecretScanningPatternConfiguration
{
    use DataModel;

    /** @see $pattern_config_version */
    public const pattern_config_version = 'pattern_config_version';
    #[Describe(['nullable' => true])]
    public ?string $pattern_config_version = null;

    /** @see $provider_pattern_overrides */
    public const provider_pattern_overrides = 'provider_pattern_overrides';
    /** @var array<int, SecretScanningPatternOverride> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningPatternOverride::class,
        'default' => [],
    ])]
    public array $provider_pattern_overrides;

    /** @see $custom_pattern_overrides */
    public const custom_pattern_overrides = 'custom_pattern_overrides';
    /** @var array<int, SecretScanningPatternOverride> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecretScanningPatternOverride::class,
        'default' => [],
    ])]
    public array $custom_pattern_overrides;
}
