<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * A classification of the file. For example to identify it as generated.
 * @link https://docs.github.com/
 */
enum CodeScanningAlertClassification: string
{
    case unknown = 'unknown';
    case source = 'source';
    case generated = 'generated';
    case test = 'test';
    case library = 'library';
}
