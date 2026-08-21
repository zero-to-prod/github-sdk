<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoReleaseReactionRequest
{
    use DataModel;

    /** @see $content */
    public const content = 'content';
    #[Describe(['default' => CreateRepoReleaseReactionRequestContent::unknown])]
    public CreateRepoReleaseReactionRequestContent $content;
}
