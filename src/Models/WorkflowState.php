<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum WorkflowState: string
{
    case unknown = 'unknown';
    case active = 'active';
    case deleted = 'deleted';
    case disabled_fork = 'disabled_fork';
    case disabled_inactivity = 'disabled_inactivity';
    case disabled_manually = 'disabled_manually';
}
