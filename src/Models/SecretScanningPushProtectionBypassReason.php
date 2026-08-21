<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for bypassing push protection.
 * @link https://docs.github.com/
 */
enum SecretScanningPushProtectionBypassReason: string
{
    case unknown = 'unknown';
    case false_positive = 'false_positive';
    case used_in_tests = 'used_in_tests';
    case will_fix_later = 'will_fix_later';
}
