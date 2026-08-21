<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Thread
 * @link https://docs.github.com/
 */
class Thread
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $subject */
    public const subject = 'subject';
    #[Describe(['nullable' => true])]
    public ?ThreadSubject $subject = null;

    /** @see $reason */
    public const reason = 'reason';
    #[Describe(['nullable' => true])]
    public ?string $reason = null;

    /** @see $unread */
    public const unread = 'unread';
    #[Describe(['nullable' => true])]
    public ?bool $unread = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $last_read_at */
    public const last_read_at = 'last_read_at';
    #[Describe(['nullable' => true])]
    public ?string $last_read_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $subscription_url */
    public const subscription_url = 'subscription_url';
    #[Describe(['nullable' => true])]
    public ?string $subscription_url = null;
}
