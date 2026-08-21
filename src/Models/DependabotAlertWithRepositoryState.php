<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the Dependabot alert.
 * @link https://docs.github.com/
 */
enum DependabotAlertWithRepositoryState: string
{
    case unknown = 'unknown';
    case auto_dismissed = 'auto_dismissed';
    case dismissed = 'dismissed';
    case fixed = 'fixed';
    case open = 'open';
}
