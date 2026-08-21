<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageReport
{
    use DataModel;

    /** @see $usageItems */
    public const usageItems = 'usageItems';
    /** @var array<int, BillingUsageReportUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingUsageReportUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
