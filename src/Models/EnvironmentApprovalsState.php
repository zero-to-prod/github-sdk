<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether deployment to the environment(s) was approved or rejected or
 * pending (with comments)
 * @link https://docs.github.com/
 */
enum EnvironmentApprovalsState: string
{
    case unknown = 'unknown';
    case approved = 'approved';
    case rejected = 'rejected';
    case pending = 'pending';
}
