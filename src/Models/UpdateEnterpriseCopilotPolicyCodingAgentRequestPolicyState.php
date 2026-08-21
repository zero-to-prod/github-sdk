<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The policy state for Copilot cloud agent in the enterprise. Can be one of
 * `enabled_for_all_orgs`, `disabled_for_all_orgs`,
 * `enabled_for_selected_orgs`, or `configured_by_org_admins`.
 * @link https://docs.github.com/
 */
enum UpdateEnterpriseCopilotPolicyCodingAgentRequestPolicyState: string
{
    case unknown = 'unknown';
    case enabled_for_all_orgs = 'enabled_for_all_orgs';
    case disabled_for_all_orgs = 'disabled_for_all_orgs';
    case enabled_for_selected_orgs = 'enabled_for_selected_orgs';
    case configured_by_org_admins = 'configured_by_org_admins';
}
