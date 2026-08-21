<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The bypass mode for the reviewer
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItemMode: string
{
    case unknown = 'unknown';
    case ALWAYS = 'ALWAYS';
    case EXEMPT = 'EXEMPT';
}
