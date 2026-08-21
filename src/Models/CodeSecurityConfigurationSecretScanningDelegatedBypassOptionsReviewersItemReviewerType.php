<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the bypass reviewer
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItemReviewerType: string
{
    case unknown = 'unknown';
    case TEAM = 'TEAM';
    case ROLE = 'ROLE';
}
