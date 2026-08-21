<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Links to download the Copilot usage metrics report for an
 * enterprise/organization for a specific day.
 * @link https://docs.github.com/
 */
class CopilotUsageMetrics1DayReport
{
    use DataModel;

    /** @see $download_links */
    public const download_links = 'download_links';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $download_links;

    /** @see $report_day */
    public const report_day = 'report_day';
    #[Describe(['nullable' => true])]
    public ?string $report_day = null;
}
