<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of permission to grant the access token to manage repository
 * projects, columns, and cards.
 * @link https://docs.github.com/
 */
enum AppPermissionsRepositoryProjects: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
    case admin = 'admin';
}
