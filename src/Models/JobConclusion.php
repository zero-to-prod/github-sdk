<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The outcome of the job.
 * @link https://docs.github.com/
 */
enum JobConclusion: string
{
    case unknown = 'unknown';
    case success = 'success';
    case failure = 'failure';
    case neutral = 'neutral';
    case cancelled = 'cancelled';
    case skipped = 'skipped';
    case timed_out = 'timed_out';
    case action_required = 'action_required';
}
