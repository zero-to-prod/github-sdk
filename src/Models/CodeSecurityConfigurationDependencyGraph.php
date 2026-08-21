<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The enablement status of Dependency Graph
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationDependencyGraph: string
{
    case unknown = 'unknown';
    case enabled = 'enabled';
    case disabled = 'disabled';
    case not_set = 'not_set';
}
