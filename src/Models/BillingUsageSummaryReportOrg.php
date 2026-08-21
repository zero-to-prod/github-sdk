<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageSummaryReportOrg
{
    use DataModel;

    /** @see $timePeriod */
    public const timePeriod = 'timePeriod';
    #[Describe(['nullable' => true])]
    public ?BillingUsageSummaryReportOrgTimePeriod $timePeriod = null;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?string $organization = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?string $repository = null;

    /** @see $product */
    public const product = 'product';
    #[Describe(['nullable' => true])]
    public ?string $product = null;

    /** @see $sku */
    public const sku = 'sku';
    #[Describe(['nullable' => true])]
    public ?string $sku = null;

    /** @see $usageItems */
    public const usageItems = 'usageItems';
    /** @var array<int, BillingUsageSummaryReportOrgUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingUsageSummaryReportOrgUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
