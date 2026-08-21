<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PullRequestMergeAsyncResultDetailsVariant1MergeMethod: string
{
    case unknown = 'unknown';
    case default = 'default';
    case merge = 'merge';
    case squash = 'squash';
    case rebase = 'rebase';
}
