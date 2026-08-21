<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class MarketplacePurchaseMarketplacePendingChange
{
    use DataModel;

    /** @see $is_installed */
    public const is_installed = 'is_installed';
    #[Describe(['nullable' => true])]
    public ?bool $is_installed = null;

    /** @see $effective_date */
    public const effective_date = 'effective_date';
    #[Describe(['nullable' => true])]
    public ?string $effective_date = null;

    /** @see $unit_count */
    public const unit_count = 'unit_count';
    #[Describe(['nullable' => true])]
    public ?int $unit_count = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $plan */
    public const plan = 'plan';
    #[Describe(['nullable' => true])]
    public ?MarketplaceListingPlan $plan = null;
}
