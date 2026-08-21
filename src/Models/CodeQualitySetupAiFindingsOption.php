<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The AI findings configuration for the repository.
 * @link https://docs.github.com/
 */
enum CodeQualitySetupAiFindingsOption: string
{
    case unknown = 'unknown';
    case disabled = 'disabled';
    case on_push = 'on_push';
}
