<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The scope of the budget for this organization. - `organization`: Apply the
 * budget to the organization. - `repository`: Apply the budget to a specific
 * repository in the organization. - `multi_user_customer`: Apply a universal
 * budget to all users in the organization. - `user`: Apply the budget to a
 * single user in the organization.
 * @link https://docs.github.com/
 */
enum UpdateOrganizationSettingBillingBudgetRequestBudgetScope: string
{
    case unknown = 'unknown';
    case enterprise = 'enterprise';
    case organization = 'organization';
    case repository = 'repository';
    case cost_center = 'cost_center';
    case multi_user_customer = 'multi_user_customer';
    case user = 'user';
}
