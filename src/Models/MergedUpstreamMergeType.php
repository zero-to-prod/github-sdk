<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum MergedUpstreamMergeType: string
{
    case unknown = 'unknown';
    case merge = 'merge';
    case fast_forward = 'fast-forward';
    case none = 'none';
}
