<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * State of a code scanning alert.
 * @link https://docs.github.com/
 */
enum CodeScanningAlertState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case dismissed = 'dismissed';
    case fixed = 'fixed';
}
