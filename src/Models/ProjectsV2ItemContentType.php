<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of content tracked in a project item
 * @link https://docs.github.com/
 */
enum ProjectsV2ItemContentType: string
{
    case unknown = 'unknown';
    case Issue = 'Issue';
    case PullRequest = 'PullRequest';
    case DraftIssue = 'DraftIssue';
}
