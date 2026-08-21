<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * **Required when using multi-line comments unless using `in_reply_to`**.
 * The `start_side` is the starting side of the diff that the comment applies
 * to. Can be `LEFT` or `RIGHT`. To learn more about multi-line comments, see
 * "[Commenting on a pull
 * request](https://docs.github.com/articles/commenting-on-a-pull-request#adding-line-comments-to-a-pull-request)"
 * in the GitHub Help documentation. See `side` in this table for additional
 * context.
 * @link https://docs.github.com/
 */
enum CreateRepoPullCommentRequestStartSide: string
{
    case unknown = 'unknown';
    case LEFT = 'LEFT';
    case RIGHT = 'RIGHT';
    case side = 'side';
}
