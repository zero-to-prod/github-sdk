<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The status of an autofix.
 * @link https://docs.github.com/
 */
enum CodeScanningAutofixStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case error = 'error';
    case success = 'success';
    case outdated = 'outdated';
}
