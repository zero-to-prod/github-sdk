<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * **Closing down notice**. The permission that new repositories will be
 * added to the team with when none is specified.
 * @link https://docs.github.com/
 */
enum UpdateOrgTeamRequestPermission: string
{
    case unknown = 'unknown';
    case pull = 'pull';
    case push = 'push';
    case admin = 'admin';
}
