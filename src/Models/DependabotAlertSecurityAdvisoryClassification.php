<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The classification of the advisory.
 * @link https://docs.github.com/
 */
enum DependabotAlertSecurityAdvisoryClassification: string
{
    case unknown = 'unknown';
    case general = 'general';
    case malware = 'malware';
}
