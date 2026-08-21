<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state that the membership should be in. Only `"active"` will be
 * accepted.
 * @link https://docs.github.com/
 */
enum UpdateUserMembershipOrgRequestState: string
{
    case unknown = 'unknown';
    case active = 'active';
}
