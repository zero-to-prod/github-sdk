<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository invitations let you manage who you collaborate with.
 * @link https://docs.github.com/
 */
class RepositorySubscription
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

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;
}
