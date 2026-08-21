<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoIssueCommentRequest
{
    use DataModel;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;
}
