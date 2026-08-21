<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of label. Read-only labels are applied automatically when the
 * runner is configured.
 * @link https://docs.github.com/
 */
enum RunnerLabelType: string
{
    case unknown = 'unknown';
    case read_only = 'read-only';
    case custom = 'custom';
}
