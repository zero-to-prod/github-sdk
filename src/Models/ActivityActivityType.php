<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the activity that was performed.
 * @link https://docs.github.com/
 */
enum ActivityActivityType: string
{
    case unknown = 'unknown';
    case push = 'push';
    case force_push = 'force_push';
    case branch_deletion = 'branch_deletion';
    case branch_creation = 'branch_creation';
    case pr_merge = 'pr_merge';
    case merge_queue_merge = 'merge_queue_merge';
}
