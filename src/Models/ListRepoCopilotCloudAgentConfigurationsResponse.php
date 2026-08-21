<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCopilotCloudAgentConfigurationsResponse
{
    use DataModel;

    /** @see $mcp_configuration */
    public const mcp_configuration = 'mcp_configuration';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $mcp_configuration;

    /** @see $enabled_tools */
    public const enabled_tools = 'enabled_tools';
    #[Describe(['nullable' => true])]
    public ?ListRepoCopilotCloudAgentConfigurationsResponseEnabledTools $enabled_tools = null;

    /** @see $require_actions_workflow_approval */
    public const require_actions_workflow_approval = 'require_actions_workflow_approval';
    #[Describe(['nullable' => true])]
    public ?bool $require_actions_workflow_approval = null;

    /** @see $is_firewall_enabled */
    public const is_firewall_enabled = 'is_firewall_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $is_firewall_enabled = null;

    /** @see $is_firewall_recommended_allowlist_enabled */
    public const is_firewall_recommended_allowlist_enabled = 'is_firewall_recommended_allowlist_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $is_firewall_recommended_allowlist_enabled = null;

    /** @see $custom_allowlist */
    public const custom_allowlist = 'custom_allowlist';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $custom_allowlist;

    /** @see $is_automations_enabled */
    public const is_automations_enabled = 'is_automations_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $is_automations_enabled = null;

    /** @see $require_write_access_for_automation_triggers */
    public const require_write_access_for_automation_triggers = 'require_write_access_for_automation_triggers';
    #[Describe(['nullable' => true])]
    public ?bool $require_write_access_for_automation_triggers = null;
}
