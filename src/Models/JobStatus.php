<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The phase of the lifecycle that the job is currently in.
 * @link https://docs.github.com/
 */
enum JobStatus: string
{
    case unknown = 'unknown';
    case queued = 'queued';
    case in_progress = 'in_progress';
    case completed = 'completed';
    case waiting = 'waiting';
    case requested = 'requested';
    case pending = 'pending';
}
