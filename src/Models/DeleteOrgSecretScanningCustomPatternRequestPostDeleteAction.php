<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * What to do with alerts associated with the deleted patterns.
 * `delete_alerts` permanently removes the alerts. `resolve_alerts` resolves
 * the alerts as "pattern deleted". Defaults to `delete_alerts` when not
 * specified.
 * @link https://docs.github.com/
 */
enum DeleteOrgSecretScanningCustomPatternRequestPostDeleteAction: string
{
    case unknown = 'unknown';
    case delete_alerts = 'delete_alerts';
    case resolve_alerts = 'resolve_alerts';
}
