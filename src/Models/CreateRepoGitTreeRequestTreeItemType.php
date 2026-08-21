<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Either `blob`, `tree`, or `commit`.
 * @link https://docs.github.com/
 */
enum CreateRepoGitTreeRequestTreeItemType: string
{
    case unknown = 'unknown';
    case blob = 'blob';
    case tree = 'tree';
    case commit = 'commit';
}
