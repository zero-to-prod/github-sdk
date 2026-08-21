<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The total number of seats set to "pending cancellation" for members of the
 * specified team(s).
 * @link https://docs.github.com/
 */
class DeleteOrgCopilotBillingSelectedTeamResponse
{
    use DataModel;

    /** @see $seats_cancelled */
    public const seats_cancelled = 'seats_cancelled';
    #[Describe(['nullable' => true])]
    public ?int $seats_cancelled = null;
}
