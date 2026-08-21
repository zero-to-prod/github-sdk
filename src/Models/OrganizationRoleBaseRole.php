<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The system role from which this role inherits permissions.
 * @link https://docs.github.com/
 */
enum OrganizationRoleBaseRole: string
{
    case unknown = 'unknown';
    case read = 'read';
    case triage = 'triage';
    case write = 'write';
    case maintain = 'maintain';
    case admin = 'admin';
}
