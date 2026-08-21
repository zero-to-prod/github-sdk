<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The state of the milestone.
 * @link https://docs.github.com/
 */
enum NullableMilestoneState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case closed = 'closed';
}
