<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum CommitComparisonStatus: string
{
    case unknown = 'unknown';
    case diverged = 'diverged';
    case ahead = 'ahead';
    case behind = 'behind';
    case identical = 'identical';
}
