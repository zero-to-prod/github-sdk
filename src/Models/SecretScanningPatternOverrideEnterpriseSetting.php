<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The push protection setting for this pattern set at the enterprise level.
 * Only present for partner patterns when the organization has a parent
 * enterprise.
 * @link https://docs.github.com/
 */
enum SecretScanningPatternOverrideEnterpriseSetting: string
{
    case unknown = 'unknown';
    case not_set = 'not-set';
    case disabled = 'disabled';
    case enabled = 'enabled';
}
