<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the code security configuration.
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationTargetType: string
{
    case unknown = 'unknown';
    case global = 'global';
    case organization = 'organization';
    case enterprise = 'enterprise';
}
