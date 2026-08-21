<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the object we're tagging. Normally this is a `commit` but it
 * can also be a `tree` or a `blob`.
 * @link https://docs.github.com/
 */
enum CreateRepoGitTagRequestType: string
{
    case unknown = 'unknown';
    case commit = 'commit';
    case tree = 'tree';
    case blob = 'blob';
}
