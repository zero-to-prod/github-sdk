<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The enforcement status for a security configuration
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationEnforcement: string
{
    case unknown = 'unknown';
    case enforced = 'enforced';
    case unenforced = 'unenforced';
}
