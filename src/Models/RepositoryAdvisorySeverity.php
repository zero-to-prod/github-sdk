<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The severity of the advisory.
 * @link https://docs.github.com/
 */
enum RepositoryAdvisorySeverity: string
{
    case unknown = 'unknown';
    case critical = 'critical';
    case high = 'high';
    case medium = 'medium';
    case low = 'low';
}
