<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingAiCreditUsageReportOrg
{
    use DataModel;

    /** @see $timePeriod */
    public const timePeriod = 'timePeriod';
    #[Describe(['nullable' => true])]
    public ?BillingAiCreditUsageReportOrgTimePeriod $timePeriod = null;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?string $organization = null;

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
    /** @var array<int, BillingAiCreditUsageReportOrgUsageItemsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BillingAiCreditUsageReportOrgUsageItemsItem::class,
        'default' => [],
    ])]
    public array $usageItems;
}
