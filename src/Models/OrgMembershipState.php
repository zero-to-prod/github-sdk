<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the member in the organization. The `pending` state indicates
 * the user has not yet accepted an invitation.
 * @link https://docs.github.com/
 */
enum OrgMembershipState: string
{
    case unknown = 'unknown';
    case active = 'active';
    case pending = 'pending';
}
