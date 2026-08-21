<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ReviewCommentLinks
{
    use DataModel;

    /** @see $self */
    public const self = 'self';
    #[Describe(['nullable' => true])]
    public ?Link $self = null;

    /** @see $html */
    public const html = 'html';
    #[Describe(['nullable' => true])]
    public ?Link $html = null;

    /** @see $pull_request */
    public const pull_request = 'pull_request';
    #[Describe(['nullable' => true])]
    public ?Link $pull_request = null;
}
