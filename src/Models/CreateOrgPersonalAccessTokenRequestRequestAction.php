<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Action to apply to the requests.
 * @link https://docs.github.com/
 */
enum CreateOrgPersonalAccessTokenRequestRequestAction: string
{
    case unknown = 'unknown';
    case approve = 'approve';
    case deny = 'deny';
}
