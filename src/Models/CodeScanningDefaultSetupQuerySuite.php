<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * CodeQL query suite to be used.
 * @link https://docs.github.com/
 */
enum CodeScanningDefaultSetupQuerySuite: string
{
    case unknown = 'unknown';
    case default = 'default';
    case extended = 'extended';
}
