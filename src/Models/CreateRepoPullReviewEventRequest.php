<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullReviewEventRequest
{
    use DataModel;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $event */
    public const event = 'event';
    #[Describe(['default' => CreateRepoPullReviewRequestEvent::unknown])]
    public CreateRepoPullReviewRequestEvent $event;
}
