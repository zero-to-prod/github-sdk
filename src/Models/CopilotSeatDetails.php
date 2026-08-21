<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about a Copilot Business seat assignment for a user, team, or
 * organization.
 * @link https://docs.github.com/
 */
class CopilotSeatDetails
{
    use DataModel;

    /** @see $assignee */
    public const assignee = 'assignee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $assignee = null;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?OrganizationSimple $organization = null;

    /** @see $assigning_team */
    public const assigning_team = 'assigning_team';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $assigning_team;

    /** @see $pending_cancellation_date */
    public const pending_cancellation_date = 'pending_cancellation_date';
    #[Describe(['nullable' => true])]
    public ?string $pending_cancellation_date = null;

    /** @see $last_activity_at */
    public const last_activity_at = 'last_activity_at';
    #[Describe(['nullable' => true])]
    public ?string $last_activity_at = null;

    /** @see $last_activity_editor */
    public const last_activity_editor = 'last_activity_editor';
    #[Describe(['nullable' => true])]
    public ?string $last_activity_editor = null;

    /** @see $last_authenticated_at */
    public const last_authenticated_at = 'last_authenticated_at';
    #[Describe(['nullable' => true])]
    public ?string $last_authenticated_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $plan_type */
    public const plan_type = 'plan_type';
    #[Describe(['nullable' => true])]
    public ?CopilotSeatDetailsPlanType $plan_type = null;
}
