<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The scope of the budget
 * @link https://docs.github.com/
 */
enum BudgetBudgetScope: string
{
    case unknown = 'unknown';
    case enterprise = 'enterprise';
    case organization = 'organization';
    case repository = 'repository';
    case cost_center = 'cost_center';
    case multi_user_customer = 'multi_user_customer';
    case multi_user_cost_center = 'multi_user_cost_center';
    case user = 'user';
}
