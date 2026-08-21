<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum CodeScanningVariantAnalysisStatus2: string
{
    case unknown = 'unknown';
    case in_progress = 'in_progress';
    case succeeded = 'succeeded';
    case failed = 'failed';
    case cancelled = 'cancelled';
}
