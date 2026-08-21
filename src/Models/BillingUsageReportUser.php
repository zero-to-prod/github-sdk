<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageReportUser
{
    use DataModel;

    /** @see $usageItems */
    public const usageItems = 'usageItems';
    /** @var array<int, BillingUsageReportUserUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingUsageReportUserUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
