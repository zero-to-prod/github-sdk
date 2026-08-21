<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageSummaryReportUser
{
    use DataModel;

    /** @see $timePeriod */
    public const timePeriod = 'timePeriod';
    #[Describe(['nullable' => true])]
    public ?BillingUsageSummaryReportUserTimePeriod $timePeriod = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;

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
    /** @var array<int, BillingUsageSummaryReportUserUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingUsageSummaryReportUserUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
