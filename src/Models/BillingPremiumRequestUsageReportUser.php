<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingPremiumRequestUsageReportUser
{
    use DataModel;

    /** @see $timePeriod */
    public const timePeriod = 'timePeriod';
    #[Describe(['nullable' => true])]
    public ?BillingPremiumRequestUsageReportUserTimePeriod $timePeriod = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;

    /** @see $product */
    public const product = 'product';
    #[Describe(['nullable' => true])]
    public ?string $product = null;

    /** @see $model */
    public const model = 'model';
    #[Describe(['nullable' => true])]
    public ?string $model = null;

    /** @see $usageItems */
    public const usageItems = 'usageItems';
    /** @var array<int, BillingPremiumRequestUsageReportUserUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingPremiumRequestUsageReportUserUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
