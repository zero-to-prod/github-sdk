<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of permission to grant the access token to view events triggered
 * by an activity in an organization.
 * @link https://docs.github.com/
 */
enum AppPermissionsOrganizationEvents: string
{
    case unknown = 'unknown';
    case read = 'read';
}
