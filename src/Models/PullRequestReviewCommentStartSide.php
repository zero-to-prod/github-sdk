<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The side of the first line of the range for a multi-line comment.
 * @link https://docs.github.com/
 */
enum PullRequestReviewCommentStartSide: string
{
    case unknown = 'unknown';
    case LEFT = 'LEFT';
    case RIGHT = 'RIGHT';
}
