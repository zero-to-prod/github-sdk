<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The token status as of the latest validity check.
 * @link https://docs.github.com/
 */
enum OrganizationSecretScanningAlertValidity: string
{
    case active = 'active';
    case inactive = 'inactive';
    case unknown = 'unknown';
}
