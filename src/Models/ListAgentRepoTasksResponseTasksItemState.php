<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Current state of the task, derived from its most recent session
 * @link https://docs.github.com/
 */
enum ListAgentRepoTasksResponseTasksItemState: string
{
    case unknown = 'unknown';
    case queued = 'queued';
    case in_progress = 'in_progress';
    case completed = 'completed';
    case failed = 'failed';
    case idle = 'idle';
    case waiting_for_user = 'waiting_for_user';
    case timed_out = 'timed_out';
    case cancelled = 'cancelled';
}
