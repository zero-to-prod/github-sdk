<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Code quality setup has been configured or not.
 * @link https://docs.github.com/
 */
enum CodeQualitySetupState: string
{
    case unknown = 'unknown';
    case configured = 'configured';
    case not_configured = 'not-configured';
}
