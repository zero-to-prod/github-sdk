<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for the current state
 * @link https://docs.github.com/
 */
enum DiscussionStateReason: string
{
    case unknown = 'unknown';
    case resolved = 'resolved';
    case outdated = 'outdated';
    case duplicate = 'duplicate';
    case reopened = 'reopened';
}
