<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BillingUsageSummaryReportOrgTimePeriod
{
    use DataModel;

    /** @see $year */
    public const year = 'year';
    #[Describe(['nullable' => true])]
    public ?int $year = null;

    /** @see $month */
    public const month = 'month';
    #[Describe(['nullable' => true])]
    public ?int $month = null;

    /** @see $day */
    public const day = 'day';
    #[Describe(['nullable' => true])]
    public ?int $day = null;
}
