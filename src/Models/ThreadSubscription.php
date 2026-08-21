<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Thread Subscription
 * @link https://docs.github.com/
 */
class ThreadSubscription
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

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $thread_url */
    public const thread_url = 'thread_url';
    #[Describe(['nullable' => true])]
    public ?string $thread_url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;
}
