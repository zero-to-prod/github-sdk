<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the custom pattern.
 * @link https://docs.github.com/
 */
enum SecretScanningCustomPatternState: string
{
    case unknown = 'unknown';
    case published = 'published';
    case unpublished = 'unpublished';
}
