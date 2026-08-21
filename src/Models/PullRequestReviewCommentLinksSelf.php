<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestReviewCommentLinksSelf
{
    use DataModel;

    /** @see $href */
    public const href = 'href';
    #[Describe(['nullable' => true])]
    public ?string $href = null;
}
