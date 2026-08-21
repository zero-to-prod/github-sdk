<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The total number of seats created for members of the specified team(s).
 * @link https://docs.github.com/
 */
class CreateOrgCopilotBillingSelectedTeamResponse
{
    use DataModel;

    /** @see $seats_created */
    public const seats_created = 'seats_created';
    #[Describe(['nullable' => true])]
    public ?int $seats_created = null;
}
