<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageSummaryReportOrgUsageItemsItem
{
    use DataModel;

    /** @see $product */
    public const product = 'product';
    #[Describe(['nullable' => true])]
    public ?string $product = null;

    /** @see $sku */
    public const sku = 'sku';
    #[Describe(['nullable' => true])]
    public ?string $sku = null;

    /** @see $unitType */
    public const unitType = 'unitType';
    #[Describe(['nullable' => true])]
    public ?string $unitType = null;

    /** @see $pricePerUnit */
    public const pricePerUnit = 'pricePerUnit';
    #[Describe(['nullable' => true])]
    public ?float $pricePerUnit = null;

    /** @see $grossQuantity */
    public const grossQuantity = 'grossQuantity';
    #[Describe(['nullable' => true])]
    public ?float $grossQuantity = null;

    /** @see $grossAmount */
    public const grossAmount = 'grossAmount';
    #[Describe(['nullable' => true])]
    public ?float $grossAmount = null;

    /** @see $discountQuantity */
    public const discountQuantity = 'discountQuantity';
    #[Describe(['nullable' => true])]
    public ?float $discountQuantity = null;

    /** @see $discountAmount */
    public const discountAmount = 'discountAmount';
    #[Describe(['nullable' => true])]
    public ?float $discountAmount = null;

    /** @see $netQuantity */
    public const netQuantity = 'netQuantity';
    #[Describe(['nullable' => true])]
    public ?float $netQuantity = null;

    /** @see $netAmount */
    public const netAmount = 'netAmount';
    #[Describe(['nullable' => true])]
    public ?float $netAmount = null;
}
