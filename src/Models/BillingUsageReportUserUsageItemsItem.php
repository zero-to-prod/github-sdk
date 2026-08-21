<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageReportUserUsageItemsItem
{
    use DataModel;

    /** @see $date */
    public const date = 'date';
    #[Describe(['nullable' => true])]
    public ?string $date = null;

    /** @see $product */
    public const product = 'product';
    #[Describe(['nullable' => true])]
    public ?string $product = null;

    /** @see $sku */
    public const sku = 'sku';
    #[Describe(['nullable' => true])]
    public ?string $sku = null;

    /** @see $quantity */
    public const quantity = 'quantity';
    #[Describe(['nullable' => true])]
    public ?int $quantity = null;

    /** @see $unitType */
    public const unitType = 'unitType';
    #[Describe(['nullable' => true])]
    public ?string $unitType = null;

    /** @see $pricePerUnit */
    public const pricePerUnit = 'pricePerUnit';
    #[Describe(['nullable' => true])]
    public ?float $pricePerUnit = null;

    /** @see $grossAmount */
    public const grossAmount = 'grossAmount';
    #[Describe(['nullable' => true])]
    public ?float $grossAmount = null;

    /** @see $discountAmount */
    public const discountAmount = 'discountAmount';
    #[Describe(['nullable' => true])]
    public ?float $discountAmount = null;

    /** @see $netAmount */
    public const netAmount = 'netAmount';
    #[Describe(['nullable' => true])]
    public ?float $netAmount = null;

    /** @see $repositoryName */
    public const repositoryName = 'repositoryName';
    #[Describe(['nullable' => true])]
    public ?string $repositoryName = null;
}
