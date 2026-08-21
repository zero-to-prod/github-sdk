<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of reviewer.
 * @link https://docs.github.com/
 */
enum DeploymentReviewerType: string
{
    case unknown = 'unknown';
    case User = 'User';
    case Team = 'Team';
}
