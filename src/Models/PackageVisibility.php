<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum PackageVisibility: string
{
    case unknown = 'unknown';
    case private = 'private';
    case public = 'public';
}
