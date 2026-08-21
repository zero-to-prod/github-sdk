<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Marketplace Listing Plan
 * @link https://docs.github.com/
 */
class MarketplaceListingPlan
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $accounts_url */
    public const accounts_url = 'accounts_url';
    #[Describe(['nullable' => true])]
    public ?string $accounts_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $monthly_price_in_cents */
    public const monthly_price_in_cents = 'monthly_price_in_cents';
    #[Describe(['nullable' => true])]
    public ?int $monthly_price_in_cents = null;

    /** @see $yearly_price_in_cents */
    public const yearly_price_in_cents = 'yearly_price_in_cents';
    #[Describe(['nullable' => true])]
    public ?int $yearly_price_in_cents = null;

    /** @see $price_model */
    public const price_model = 'price_model';
    #[Describe(['default' => MarketplaceListingPlanPriceModel::unknown])]
    public MarketplaceListingPlanPriceModel $price_model;

    /** @see $has_free_trial */
    public const has_free_trial = 'has_free_trial';
    #[Describe(['nullable' => true])]
    public ?bool $has_free_trial = null;

    /** @see $unit_name */
    public const unit_name = 'unit_name';
    #[Describe(['nullable' => true])]
    public ?string $unit_name = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $bullets */
    public const bullets = 'bullets';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $bullets;
}
