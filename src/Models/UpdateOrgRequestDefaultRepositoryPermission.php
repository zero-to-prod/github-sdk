<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Default permission level members have for organization repositories.
 * @link https://docs.github.com/
 */
enum UpdateOrgRequestDefaultRepositoryPermission: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
    case admin = 'admin';
    case none = 'none';
}
