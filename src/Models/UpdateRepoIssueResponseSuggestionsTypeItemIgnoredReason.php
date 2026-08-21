<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum UpdateRepoIssueResponseSuggestionsTypeItemIgnoredReason: string
{
    case unknown = 'unknown';
    case already_applied = 'already_applied';
    case issue_already_closed = 'issue_already_closed';
}
