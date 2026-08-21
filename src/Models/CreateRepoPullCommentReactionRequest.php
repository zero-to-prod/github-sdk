<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullCommentReactionRequest
{
    use DataModel;

    /** @see $content */
    public const content = 'content';
    #[Describe(['default' => ReactionContent::unknown])]
    public ReactionContent $content;
}
