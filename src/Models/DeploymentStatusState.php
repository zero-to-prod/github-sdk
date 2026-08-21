<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the status.
 * @link https://docs.github.com/
 */
enum DeploymentStatusState: string
{
    case unknown = 'unknown';
    case error = 'error';
    case failure = 'failure';
    case inactive = 'inactive';
    case pending = 'pending';
    case success = 'success';
    case queued = 'queued';
    case in_progress = 'in_progress';
}
