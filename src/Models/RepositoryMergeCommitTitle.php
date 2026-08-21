<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default value for a merge commit title. - `PR_TITLE` - default to the
 * pull request's title. - `MERGE_MESSAGE` - default to the classic title for
 * a merge message (e.g., Merge pull request #123 from branch-name).
 * @link https://docs.github.com/
 */
enum RepositoryMergeCommitTitle: string
{
    case unknown = 'unknown';
    case PR_TITLE = 'PR_TITLE';
    case MERGE_MESSAGE = 'MERGE_MESSAGE';
}
