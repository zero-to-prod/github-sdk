<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * State of a code scanning alert instance.
 * @link https://docs.github.com/
 */
enum CodeScanningAlertInstanceState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case fixed = 'fixed';
}
