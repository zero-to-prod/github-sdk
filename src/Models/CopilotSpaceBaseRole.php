<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The base role that determines default permissions. - `no_access`: No
 * default access - `reader`: Default read permissions - `writer`: Default
 * write permissions (organization spaces only) - `admin`: Default admin
 * permissions (organization spaces only)
 * @link https://docs.github.com/
 */
enum CopilotSpaceBaseRole: string
{
    case unknown = 'unknown';
    case reader = 'reader';
    case writer = 'writer';
    case admin = 'admin';
    case no_access = 'no_access';
}
