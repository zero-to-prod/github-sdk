<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The review action you want to perform. The review actions include:
 * `APPROVE`, `REQUEST_CHANGES`, or `COMMENT`. By leaving this blank, you set
 * the review action state to `PENDING`, which means you will need to [submit
 * the pull request
 * review](https://docs.github.com/rest/pulls/reviews#submit-a-review-for-a-pull-request)
 * when you are ready.
 * @link https://docs.github.com/
 */
enum CreateRepoPullReviewRequestEvent: string
{
    case unknown = 'unknown';
    case APPROVE = 'APPROVE';
    case REQUEST_CHANGES = 'REQUEST_CHANGES';
    case COMMENT = 'COMMENT';
}
