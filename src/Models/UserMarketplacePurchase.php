<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * User Marketplace Purchase
 * @link https://docs.github.com/
 */
class UserMarketplacePurchase
{
    use DataModel;

    /** @see $billing_cycle */
    public const billing_cycle = 'billing_cycle';
    #[Describe(['nullable' => true])]
    public ?string $billing_cycle = null;

    /** @see $next_billing_date */
    public const next_billing_date = 'next_billing_date';
    #[Describe(['nullable' => true])]
    public ?string $next_billing_date = null;

    /** @see $unit_count */
    public const unit_count = 'unit_count';
    #[Describe(['nullable' => true])]
    public ?int $unit_count = null;

    /** @see $on_free_trial */
    public const on_free_trial = 'on_free_trial';
    #[Describe(['nullable' => true])]
    public ?bool $on_free_trial = null;

    /** @see $free_trial_ends_on */
    public const free_trial_ends_on = 'free_trial_ends_on';
    #[Describe(['nullable' => true])]
    public ?string $free_trial_ends_on = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $account */
    public const account = 'account';
    #[Describe(['nullable' => true])]
    public ?MarketplaceAccount $account = null;

    /** @see $plan */
    public const plan = 'plan';
    #[Describe(['nullable' => true])]
    public ?MarketplaceListingPlan $plan = null;
}
