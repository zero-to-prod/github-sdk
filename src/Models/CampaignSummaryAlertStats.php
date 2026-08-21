<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CampaignSummaryAlertStats
{
    use DataModel;

    /** @see $open_count */
    public const open_count = 'open_count';
    #[Describe(['nullable' => true])]
    public ?int $open_count = null;

    /** @see $closed_count */
    public const closed_count = 'closed_count';
    #[Describe(['nullable' => true])]
    public ?int $closed_count = null;

    /** @see $in_progress_count */
    public const in_progress_count = 'in_progress_count';
    #[Describe(['nullable' => true])]
    public ?int $in_progress_count = null;
}
