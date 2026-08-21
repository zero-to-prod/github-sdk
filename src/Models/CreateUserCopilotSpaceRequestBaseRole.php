<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The base role that determines default permissions for the space. -
 * `no_access`: No default access (default) - `reader`: Makes the space
 * publicly readable Note: User spaces do not support writer or admin base
 * roles.
 * @link https://docs.github.com/
 */
enum CreateUserCopilotSpaceRequestBaseRole: string
{
    case unknown = 'unknown';
    case reader = 'reader';
    case no_access = 'no_access';
}
