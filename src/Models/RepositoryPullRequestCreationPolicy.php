<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The policy controlling who can create pull requests: all or
 * collaborators_only.
 * @link https://docs.github.com/
 */
enum RepositoryPullRequestCreationPolicy: string
{
    case unknown = 'unknown';
    case all = 'all';
    case collaborators_only = 'collaborators_only';
}
