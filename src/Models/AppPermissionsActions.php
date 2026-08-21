<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of permission to grant the access token for GitHub Actions
 * workflows, workflow runs, and artifacts.
 * @link https://docs.github.com/
 */
enum AppPermissionsActions: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
}
