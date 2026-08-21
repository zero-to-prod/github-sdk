<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Links to download the latest Copilot usage metrics report for an
 * enterprise/organization.
 * @link https://docs.github.com/
 */
class CopilotUsageMetrics28DayReport
{
    use DataModel;

    /** @see $download_links */
    public const download_links = 'download_links';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $download_links;

    /** @see $report_start_day */
    public const report_start_day = 'report_start_day';
    #[Describe(['nullable' => true])]
    public ?string $report_start_day = null;

    /** @see $report_end_day */
    public const report_end_day = 'report_end_day';
    #[Describe(['nullable' => true])]
    public ?string $report_end_day = null;
}
