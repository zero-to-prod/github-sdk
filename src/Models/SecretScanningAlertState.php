<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Sets the state of the secret scanning alert. You must provide `resolution`
 * when you set the state to `resolved`.
 * @link https://docs.github.com/
 */
enum SecretScanningAlertState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case resolved = 'resolved';
}
