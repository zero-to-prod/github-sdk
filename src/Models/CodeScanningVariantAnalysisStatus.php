<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The new status of the CodeQL variant analysis repository task.
 * @link https://docs.github.com/
 */
enum CodeScanningVariantAnalysisStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case in_progress = 'in_progress';
    case succeeded = 'succeeded';
    case failed = 'failed';
    case canceled = 'canceled';
    case timed_out = 'timed_out';
}
