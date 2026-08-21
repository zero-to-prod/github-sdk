<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The total number of seats created for the specified user(s).
 * @link https://docs.github.com/
 */
class CreateOrgCopilotBillingSelectedUserResponse
{
    use DataModel;

    /** @see $seats_created */
    public const seats_created = 'seats_created';
    #[Describe(['nullable' => true])]
    public ?int $seats_created = null;
}
