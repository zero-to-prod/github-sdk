<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The status of the runner.
 * @link https://docs.github.com/
 */
enum ActionsHostedRunnerStatus: string
{
    case unknown = 'unknown';
    case Ready = 'Ready';
    case Provisioning = 'Provisioning';
    case Shutdown = 'Shutdown';
    case Deleting = 'Deleting';
    case Stuck = 'Stuck';
}
