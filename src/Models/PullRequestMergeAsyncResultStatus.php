<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PullRequestMergeAsyncResultStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case merged = 'merged';
    case enqueued = 'enqueued';
    case failed = 'failed';
}
