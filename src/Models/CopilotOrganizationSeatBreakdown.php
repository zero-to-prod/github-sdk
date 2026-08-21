<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The breakdown of Copilot Business seats for the organization.
 * @link https://docs.github.com/
 */
class CopilotOrganizationSeatBreakdown
{
    use DataModel;

    /** @see $total */
    public const total = 'total';
    #[Describe(['nullable' => true])]
    public ?int $total = null;

    /** @see $added_this_cycle */
    public const added_this_cycle = 'added_this_cycle';
    #[Describe(['nullable' => true])]
    public ?int $added_this_cycle = null;

    /** @see $pending_cancellation */
    public const pending_cancellation = 'pending_cancellation';
    #[Describe(['nullable' => true])]
    public ?int $pending_cancellation = null;

    /** @see $pending_invitation */
    public const pending_invitation = 'pending_invitation';
    #[Describe(['nullable' => true])]
    public ?int $pending_invitation = null;

    /** @see $active_this_cycle */
    public const active_this_cycle = 'active_this_cycle';
    #[Describe(['nullable' => true])]
    public ?int $active_this_cycle = null;

    /** @see $inactive_this_cycle */
    public const inactive_this_cycle = 'inactive_this_cycle';
    #[Describe(['nullable' => true])]
    public ?int $inactive_this_cycle = null;
}
