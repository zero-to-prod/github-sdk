<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of advisory.
 * @link https://docs.github.com/
 */
enum GlobalAdvisoryType: string
{
    case unknown = 'unknown';
    case reviewed = 'reviewed';
    case unreviewed = 'unreviewed';
    case malware = 'malware';
}
