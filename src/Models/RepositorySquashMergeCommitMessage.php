<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default value for a squash merge commit message: - `PR_BODY` - default
 * to the pull request's body. - `COMMIT_MESSAGES` - default to the branch's
 * commit messages. - `BLANK` - default to a blank commit message.
 * @link https://docs.github.com/
 */
enum RepositorySquashMergeCommitMessage: string
{
    case unknown = 'unknown';
    case PR_BODY = 'PR_BODY';
    case COMMIT_MESSAGES = 'COMMIT_MESSAGES';
    case BLANK = 'BLANK';
}
