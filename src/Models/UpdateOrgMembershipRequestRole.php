<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The role to give the user in the organization. Can be one of: * `admin` -
 * The user will become an owner of the organization. * `member` - The user
 * will become a non-owner member of the organization.
 * @link https://docs.github.com/
 */
enum UpdateOrgMembershipRequestRole: string
{
    case unknown = 'unknown';
    case admin = 'admin';
    case member = 'member';
}
