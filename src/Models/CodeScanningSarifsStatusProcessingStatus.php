<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * `pending` files have not yet been processed, while `complete` means
 * results from the SARIF have been stored. `failed` files have either not
 * been processed at all, or could only be partially processed.
 * @link https://docs.github.com/
 */
enum CodeScanningSarifsStatusProcessingStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case complete = 'complete';
    case failed = 'failed';
}
