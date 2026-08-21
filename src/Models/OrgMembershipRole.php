<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The user's membership type in the organization.
 * @link https://docs.github.com/
 */
enum OrgMembershipRole: string
{
    case unknown = 'unknown';
    case admin = 'admin';
    case member = 'member';
    case billing_manager = 'billing_manager';
}
