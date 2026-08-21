<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level at which the comment is targeted, can be a diff line or a file.
 * @link https://docs.github.com/
 */
enum PullRequestReviewCommentSubjectType: string
{
    case unknown = 'unknown';
    case line = 'line';
    case file = 'file';
}
