<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The total number of seats set to "pending cancellation" for the specified
 * users.
 * @link https://docs.github.com/
 */
class DeleteOrgCopilotBillingSelectedUserResponse
{
    use DataModel;

    /** @see $seats_cancelled */
    public const seats_cancelled = 'seats_cancelled';
    #[Describe(['nullable' => true])]
    public ?int $seats_cancelled = null;
}
