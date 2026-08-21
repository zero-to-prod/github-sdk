<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum UpdateRepoIssueResponseSuggestionsTypeItemConfidence: string
{
    case unknown = 'unknown';
    case low = 'low';
    case medium = 'medium';
    case high = 'high';
}
