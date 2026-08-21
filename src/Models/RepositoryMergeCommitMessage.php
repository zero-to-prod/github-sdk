<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default value for a merge commit message. - `PR_TITLE` - default to
 * the pull request's title. - `PR_BODY` - default to the pull request's
 * body. - `BLANK` - default to a blank commit message.
 * @link https://docs.github.com/
 */
enum RepositoryMergeCommitMessage: string
{
    case unknown = 'unknown';
    case PR_BODY = 'PR_BODY';
    case PR_TITLE = 'PR_TITLE';
    case BLANK = 'BLANK';
}
