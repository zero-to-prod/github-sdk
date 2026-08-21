<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Action to apply to the fine-grained personal access token.
 * @link https://docs.github.com/
 */
enum CreateOrgPersonalAccessTokenRequestAction: string
{
    case unknown = 'unknown';
    case revoke = 'revoke';
}
