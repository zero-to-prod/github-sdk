<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Webhooks for repositories.
 * @link https://docs.github.com/
 */
class Hook
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $active */
    public const active = 'active';
    #[Describe(['nullable' => true])]
    public ?bool $active = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $config */
    public const config = 'config';
    #[Describe(['nullable' => true])]
    public ?WebhookConfig $config = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $test_url */
    public const test_url = 'test_url';
    #[Describe(['nullable' => true])]
    public ?string $test_url = null;

    /** @see $ping_url */
    public const ping_url = 'ping_url';
    #[Describe(['nullable' => true])]
    public ?string $ping_url = null;

    /** @see $deliveries_url */
    public const deliveries_url = 'deliveries_url';
    #[Describe(['nullable' => true])]
    public ?string $deliveries_url = null;

    /** @see $last_response */
    public const last_response = 'last_response';
    #[Describe(['nullable' => true])]
    public ?HookResponse $last_response = null;
}
