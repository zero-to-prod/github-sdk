<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The reason for the state change. Ignored unless `state` is changed.
 * @link https://docs.github.com/
 */
enum UpdateRepoIssueRequestStateReason: string
{
    case unknown = 'unknown';
    case completed = 'completed';
    case not_planned = 'not_planned';
    case duplicate = 'duplicate';
    case reopened = 'reopened';
}
