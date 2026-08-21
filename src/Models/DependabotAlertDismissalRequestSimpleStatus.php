<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The current status of the dismissal request.
 * @link https://docs.github.com/
 */
enum DependabotAlertDismissalRequestSimpleStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case approved = 'approved';
    case rejected = 'rejected';
    case cancelled = 'cancelled';
}
