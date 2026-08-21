<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Delivery made by a webhook.
 * @link https://docs.github.com/
 */
class HookDelivery
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $guid */
    public const guid = 'guid';
    #[Describe(['nullable' => true])]
    public ?string $guid = null;

    /** @see $delivered_at */
    public const delivered_at = 'delivered_at';
    #[Describe(['nullable' => true])]
    public ?string $delivered_at = null;

    /** @see $redelivery */
    public const redelivery = 'redelivery';
    #[Describe(['nullable' => true])]
    public ?bool $redelivery = null;

    /** @see $duration */
    public const duration = 'duration';
    #[Describe(['nullable' => true])]
    public ?float $duration = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $status_code */
    public const status_code = 'status_code';
    #[Describe(['nullable' => true])]
    public ?int $status_code = null;

    /** @see $event */
    public const event = 'event';
    #[Describe(['nullable' => true])]
    public ?string $event = null;

    /** @see $action */
    public const action = 'action';
    #[Describe(['nullable' => true])]
    public ?string $action = null;

    /** @see $installation_id */
    public const installation_id = 'installation_id';
    #[Describe(['nullable' => true])]
    public ?int $installation_id = null;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $throttled_at */
    public const throttled_at = 'throttled_at';
    #[Describe(['nullable' => true])]
    public ?string $throttled_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $request */
    public const request = 'request';
    #[Describe(['nullable' => true])]
    public ?HookDeliveryRequest $request = null;

    /** @see $response */
    public const response = 'response';
    #[Describe(['nullable' => true])]
    public ?HookDeliveryResponse $response = null;
}
