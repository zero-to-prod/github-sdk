<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SubIssuesSummary
{
    use DataModel;

    /** @see $total */
    public const total = 'total';
    #[Describe(['nullable' => true])]
    public ?int $total = null;

    /** @see $completed */
    public const completed = 'completed';
    #[Describe(['nullable' => true])]
    public ?int $completed = null;

    /** @see $percent_completed */
    public const percent_completed = 'percent_completed';
    #[Describe(['nullable' => true])]
    public ?int $percent_completed = null;
}
