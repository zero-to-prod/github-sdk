<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The scope of the budget for this organization. - `organization`: Apply the
 * budget to the organization. - `repository`: Apply the budget to a specific
 * repository in the organization. - `multi_user_customer`: Apply a universal
 * budget to all users in the organization. - `user`: Apply the budget to a
 * single user in the organization. `user` and `multi_user_customer` scopes
 * are only supported when `budget_product_sku` is `ai_credits` or
 * `premium_requests`.
 * @link https://docs.github.com/
 */
enum CreateOrganizationSettingBillingBudgetRequestBudgetScope: string
{
    case unknown = 'unknown';
    case organization = 'organization';
    case repository = 'repository';
    case multi_user_customer = 'multi_user_customer';
    case user = 'user';
}
