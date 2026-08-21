<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The current state of the discussion. `converting` means that the
 * discussion is being converted from an issue. `transferring` means that the
 * discussion is being transferred from another repository.
 * @link https://docs.github.com/
 */
enum DiscussionState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case closed = 'closed';
    case locked = 'locked';
    case converting = 'converting';
    case transferring = 'transferring';
}
