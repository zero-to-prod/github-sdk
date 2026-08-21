<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The enablement status of GitHub Advanced Security
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationAdvancedSecurity: string
{
    case unknown = 'unknown';
    case enabled = 'enabled';
    case disabled = 'disabled';
    case code_security = 'code_security';
    case secret_protection = 'secret_protection';
}
