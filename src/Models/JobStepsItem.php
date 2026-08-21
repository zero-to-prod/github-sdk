<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class JobStepsItem
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => JobStepsItemStatus::unknown])]
    public JobStepsItemStatus $status;

    /** @see $conclusion */
    public const conclusion = 'conclusion';
    #[Describe(['nullable' => true])]
    public ?string $conclusion = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;
}
