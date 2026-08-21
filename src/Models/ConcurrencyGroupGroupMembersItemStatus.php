<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum ConcurrencyGroupGroupMembersItemStatus: string
{
    case unknown = 'unknown';
    case in_progress = 'in_progress';
    case pending = 'pending';
}
