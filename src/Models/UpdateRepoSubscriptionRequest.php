<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoSubscriptionRequest
{
    use DataModel;

    /** @see $subscribed */
    public const subscribed = 'subscribed';
    #[Describe(['nullable' => true])]
    public ?bool $subscribed = null;

    /** @see $ignored */
    public const ignored = 'ignored';
    #[Describe(['nullable' => true])]
    public ?bool $ignored = null;
}
