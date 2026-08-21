<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether to approve or reject deployment to the specified environments.
 * @link https://docs.github.com/
 */
enum ReviewCustomGatesStateRequiredState: string
{
    case unknown = 'unknown';
    case approved = 'approved';
    case rejected = 'rejected';
}
