<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The action that will be taken to merge the pull request. `direct_merge`
 * merges the pull request directly without using a merge queue;
 * `merge_queue` adds the pull request to a merge queue; `default` selects
 * the most appropriate option.
 * @link https://docs.github.com/
 */
enum UpdateRepoPullMergeAsyncRequestMergeAction: string
{
    case unknown = 'unknown';
    case default = 'default';
    case direct_merge = 'direct_merge';
    case merge_queue = 'merge_queue';
}
