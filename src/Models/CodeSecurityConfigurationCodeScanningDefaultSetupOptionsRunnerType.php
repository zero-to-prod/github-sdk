<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether to use labeled runners or standard GitHub runners.
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationCodeScanningDefaultSetupOptionsRunnerType: string
{
    case unknown = 'unknown';
    case standard = 'standard';
    case labeled = 'labeled';
    case not_set = 'not_set';
}
