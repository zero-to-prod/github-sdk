<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * **Required when the state is dismissed.** The reason for dismissing or
 * closing the alert.
 * @link https://docs.github.com/
 */
enum CodeScanningAlertDismissedReason: string
{
    case unknown = 'unknown';
    case false_positive = 'false positive';
    case won_t_fix = 'won\'t fix';
    case used_in_tests = 'used in tests';
    case mitigated = 'mitigated';
}
