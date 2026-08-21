<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The severity of the alert.
 * @link https://docs.github.com/
 */
enum CodeScanningAlertRuleSummarySeverity: string
{
    case unknown = 'unknown';
    case none = 'none';
    case note = 'note';
    case warning = 'warning';
    case error = 'error';
}
