<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The Git hash algorithm used by this repository.
 * @link https://docs.github.com/
 */
enum RepositoryHashAlgorithmHashAlgorithm: string
{
    case unknown = 'unknown';
    case sha1 = 'sha1';
    case sha256 = 'sha256';
}
