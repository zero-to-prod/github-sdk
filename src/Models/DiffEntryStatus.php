<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum DiffEntryStatus: string
{
    case unknown = 'unknown';
    case added = 'added';
    case removed = 'removed';
    case modified = 'modified';
    case renamed = 'renamed';
    case copied = 'copied';
    case changed = 'changed';
    case unchanged = 'unchanged';
}
