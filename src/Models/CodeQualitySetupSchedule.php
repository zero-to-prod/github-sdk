<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The frequency of the periodic analysis.
 * @link https://docs.github.com/
 */
enum CodeQualitySetupSchedule: string
{
    case unknown = 'unknown';
    case weekly = 'weekly';
}
