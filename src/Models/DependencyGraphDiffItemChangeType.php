<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum DependencyGraphDiffItemChangeType: string
{
    case unknown = 'unknown';
    case added = 'added';
    case removed = 'removed';
}
