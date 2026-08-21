<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Where the dependency is utilized. `development` means that the dependency
 * is only utilized in the development environment. `runtime` means that the
 * dependency is utilized at runtime and in the development environment.
 * @link https://docs.github.com/
 */
enum DependencyGraphDiffItemScope: string
{
    case unknown = 'unknown';
    case runtime = 'runtime';
    case development = 'development';
}
