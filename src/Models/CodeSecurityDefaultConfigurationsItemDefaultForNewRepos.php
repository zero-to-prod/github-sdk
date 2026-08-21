<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The visibility of newly created repositories for which the code security
 * configuration will be applied to by default
 * @link https://docs.github.com/
 */
enum CodeSecurityDefaultConfigurationsItemDefaultForNewRepos: string
{
    case unknown = 'unknown';
    case public = 'public';
    case private_and_internal = 'private_and_internal';
    case all = 'all';
}
