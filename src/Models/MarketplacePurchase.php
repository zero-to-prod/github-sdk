<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Marketplace Purchase
 * @link https://docs.github.com/
 */
class MarketplacePurchase
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $organization_billing_email */
    public const organization_billing_email = 'organization_billing_email';
    #[Describe(['nullable' => true])]
    public ?string $organization_billing_email = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $marketplace_pending_change */
    public const marketplace_pending_change = 'marketplace_pending_change';
    #[Describe(['nullable' => true])]
    public ?MarketplacePurchaseMarketplacePendingChange $marketplace_pending_change = null;

    /** @see $marketplace_purchase */
    public const marketplace_purchase = 'marketplace_purchase';
    #[Describe(['nullable' => true])]
    public ?MarketplacePurchaseMarketplacePurchase $marketplace_purchase = null;
}
