<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * State of the code quality finding.
 * @link https://docs.github.com/
 */
enum CodeQualityFindingState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case dismissed = 'dismissed';
}
