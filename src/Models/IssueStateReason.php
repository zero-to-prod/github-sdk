<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for the current state
 * @link https://docs.github.com/
 */
enum IssueStateReason: string
{
    case unknown = 'unknown';
    case completed = 'completed';
    case reopened = 'reopened';
    case not_planned = 'not_planned';
    case duplicate = 'duplicate';
}
