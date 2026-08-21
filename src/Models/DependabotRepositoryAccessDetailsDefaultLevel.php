<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default repository access level for Dependabot updates.
 * @link https://docs.github.com/
 */
enum DependabotRepositoryAccessDetailsDefaultLevel: string
{
    case unknown = 'unknown';
    case public = 'public';
    case internal = 'internal';
}
