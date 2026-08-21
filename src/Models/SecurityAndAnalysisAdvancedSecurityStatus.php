<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum SecurityAndAnalysisAdvancedSecurityStatus: string
{
    case unknown = 'unknown';
    case enabled = 'enabled';
    case disabled = 'disabled';
}
