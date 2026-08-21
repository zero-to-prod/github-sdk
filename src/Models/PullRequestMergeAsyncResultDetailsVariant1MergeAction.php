<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PullRequestMergeAsyncResultDetailsVariant1MergeAction: string
{
    case unknown = 'unknown';
    case default = 'default';
    case merge_queue = 'merge_queue';
    case direct_merge = 'direct_merge';
}
