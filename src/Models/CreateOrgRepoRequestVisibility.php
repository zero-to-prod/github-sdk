<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The visibility of the repository.
 * @link https://docs.github.com/
 */
enum CreateOrgRepoRequestVisibility: string
{
    case unknown = 'unknown';
    case public = 'public';
    case private = 'private';
}
