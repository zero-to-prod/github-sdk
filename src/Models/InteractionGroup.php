<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of GitHub user that can comment, open issues, or create pull
 * requests while the interaction limit is in effect.
 * @link https://docs.github.com/
 */
enum InteractionGroup: string
{
    case unknown = 'unknown';
    case existing_users = 'existing_users';
    case contributors_only = 'contributors_only';
    case collaborators_only = 'collaborators_only';
}
