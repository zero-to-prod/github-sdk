<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default push protection setting for this pattern.
 * @link https://docs.github.com/
 */
enum SecretScanningPatternOverrideDefaultSetting: string
{
    case unknown = 'unknown';
    case disabled = 'disabled';
    case enabled = 'enabled';
}
