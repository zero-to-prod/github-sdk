<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * State of the release asset.
 * @link https://docs.github.com/
 */
enum ReleaseAssetState: string
{
    case unknown = 'unknown';
    case uploaded = 'uploaded';
    case open = 'open';
}
