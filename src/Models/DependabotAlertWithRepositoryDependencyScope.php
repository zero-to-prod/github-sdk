<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The execution scope of the vulnerable dependency.
 * @link https://docs.github.com/
 */
enum DependabotAlertWithRepositoryDependencyScope: string
{
    case unknown = 'unknown';
    case development = 'development';
    case runtime = 'runtime';
}
