<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The image provider.
 * @link https://docs.github.com/
 */
enum NullableActionsHostedRunnerPoolImageSource: string
{
    case unknown = 'unknown';
    case github = 'github';
    case partner = 'partner';
    case custom = 'custom';
}
