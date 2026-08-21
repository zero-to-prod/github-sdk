<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Org Hook
 * @link https://docs.github.com/
 */
class OrgHook
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $ping_url */
    public const ping_url = 'ping_url';
    #[Describe(['nullable' => true])]
    public ?string $ping_url = null;

    /** @see $deliveries_url */
    public const deliveries_url = 'deliveries_url';
    #[Describe(['nullable' => true])]
    public ?string $deliveries_url = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $active */
    public const active = 'active';
    #[Describe(['nullable' => true])]
    public ?bool $active = null;

    /** @see $config */
    public const config = 'config';
    #[Describe(['nullable' => true])]
    public ?OrgHookConfig $config = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;
}
