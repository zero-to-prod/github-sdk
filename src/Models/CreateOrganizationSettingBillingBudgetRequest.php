<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrganizationSettingBillingBudgetRequest
{
    use DataModel;

    /** @see $budget_amount */
    public const budget_amount = 'budget_amount';
    #[Describe(['nullable' => true])]
    public ?int $budget_amount = null;

    /** @see $prevent_further_usage */
    public const prevent_further_usage = 'prevent_further_usage';
    #[Describe(['nullable' => true])]
    public ?bool $prevent_further_usage = null;

    /** @see $budget_alerting */
    public const budget_alerting = 'budget_alerting';
    #[Describe(['nullable' => true])]
    public ?CreateOrganizationSettingBillingBudgetRequestBudgetAlerting $budget_alerting = null;

    /** @see $budget_scope */
    public const budget_scope = 'budget_scope';
    #[Describe(['nullable' => true])]
    public ?CreateOrganizationSettingBillingBudgetRequestBudgetScope $budget_scope = null;

    /** @see $budget_entity_name */
    public const budget_entity_name = 'budget_entity_name';
    #[Describe(['nullable' => true])]
    public ?string $budget_entity_name = null;

    /** @see $budget_type */
    public const budget_type = 'budget_type';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $budget_type;

    /** @see $budget_product_sku */
    public const budget_product_sku = 'budget_product_sku';
    #[Describe(['nullable' => true])]
    public ?string $budget_product_sku = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;
}
