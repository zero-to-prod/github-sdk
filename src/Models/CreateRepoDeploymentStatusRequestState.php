<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the status. When you set a transient deployment to
 * `inactive`, the deployment will be shown as `destroyed` in GitHub.
 * @link https://docs.github.com/
 */
enum CreateRepoDeploymentStatusRequestState: string
{
    case unknown = 'unknown';
    case error = 'error';
    case failure = 'failure';
    case inactive = 'inactive';
    case in_progress = 'in_progress';
    case queued = 'queued';
    case pending = 'pending';
    case success = 'success';
}
