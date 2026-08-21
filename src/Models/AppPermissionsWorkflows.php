<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of permission to grant the access token to update GitHub Actions
 * workflow files.
 * @link https://docs.github.com/
 */
enum AppPermissionsWorkflows: string
{
    case unknown = 'unknown';
    case write = 'write';
}
