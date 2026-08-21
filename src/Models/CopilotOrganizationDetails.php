<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about the seat breakdown and policies set for an organization
 * with a Copilot Business or Copilot Enterprise subscription.
 * @link https://docs.github.com/
 */
class CopilotOrganizationDetails
{
    use DataModel;

    /** @see $seat_breakdown */
    public const seat_breakdown = 'seat_breakdown';
    #[Describe(['nullable' => true])]
    public ?CopilotOrganizationSeatBreakdown $seat_breakdown = null;

    /** @see $public_code_suggestions */
    public const public_code_suggestions = 'public_code_suggestions';
    #[Describe(['default' => CopilotOrganizationDetailsPublicCodeSuggestions::unknown])]
    public CopilotOrganizationDetailsPublicCodeSuggestions $public_code_suggestions;

    /** @see $ide_chat */
    public const ide_chat = 'ide_chat';
    #[Describe(['nullable' => true])]
    public ?CopilotOrganizationDetailsIdeChat $ide_chat = null;

    /** @see $platform_chat */
    public const platform_chat = 'platform_chat';
    #[Describe(['nullable' => true])]
    public ?CopilotOrganizationDetailsIdeChat $platform_chat = null;

    /** @see $cli */
    public const cli = 'cli';
    #[Describe(['nullable' => true])]
    public ?CopilotOrganizationDetailsIdeChat $cli = null;

    /** @see $seat_management_setting */
    public const seat_management_setting = 'seat_management_setting';
    #[Describe(['default' => CopilotOrganizationDetailsSeatManagementSetting::unknown])]
    public CopilotOrganizationDetailsSeatManagementSetting $seat_management_setting;

    /** @see $plan_type */
    public const plan_type = 'plan_type';
    #[Describe(['nullable' => true])]
    public ?CopilotOrganizationDetailsPlanType $plan_type = null;
}
