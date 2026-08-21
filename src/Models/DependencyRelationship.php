<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * A notation of whether a dependency is requested directly by this manifest
 * or is a dependency of another dependency.
 * @link https://docs.github.com/
 */
enum DependencyRelationship: string
{
    case unknown = 'unknown';
    case direct = 'direct';
    case indirect = 'indirect';
}
