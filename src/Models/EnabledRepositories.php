<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The policy that controls the repositories in the organization that are
 * allowed to run GitHub Actions.
 * @link https://docs.github.com/
 */
enum EnabledRepositories: string
{
    case unknown = 'unknown';
    case all = 'all';
    case none = 'none';
    case selected = 'selected';
}
