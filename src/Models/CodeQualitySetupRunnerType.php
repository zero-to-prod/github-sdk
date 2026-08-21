<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Runner type to be used.
 * @link https://docs.github.com/
 */
enum CodeQualitySetupRunnerType: string
{
    case unknown = 'unknown';
    case standard = 'standard';
    case labeled = 'labeled';
}
