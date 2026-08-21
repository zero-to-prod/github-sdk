<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason that the alert was dismissed.
 * @link https://docs.github.com/
 */
enum DependabotAlertWithRepositoryDismissedReason: string
{
    case unknown = 'unknown';
    case fix_started = 'fix_started';
    case inaccurate = 'inaccurate';
    case no_bandwidth = 'no_bandwidth';
    case not_used = 'not_used';
    case tolerable_risk = 'tolerable_risk';
}
