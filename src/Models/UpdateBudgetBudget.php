<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateBudgetBudget
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $budget_scope */
    public const budget_scope = 'budget_scope';
    #[Describe(['nullable' => true])]
    public ?BudgetBudgetScope $budget_scope = null;

    /** @see $budget_entity_name */
    public const budget_entity_name = 'budget_entity_name';
    #[Describe(['nullable' => true])]
    public ?string $budget_entity_name = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;

    /** @see $consumed_amount */
    public const consumed_amount = 'consumed_amount';
    #[Describe(['nullable' => true])]
    public ?float $consumed_amount = null;

    /** @see $budget_amount */
    public const budget_amount = 'budget_amount';
    #[Describe(['nullable' => true])]
    public ?int $budget_amount = null;

    /** @see $prevent_further_usage */
    public const prevent_further_usage = 'prevent_further_usage';
    #[Describe(['nullable' => true])]
    public ?bool $prevent_further_usage = null;

    /** @see $budget_product_sku */
    public const budget_product_sku = 'budget_product_sku';
    #[Describe(['nullable' => true])]
    public ?string $budget_product_sku = null;

    /** @see $budget_type */
    public const budget_type = 'budget_type';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $budget_type;

    /** @see $budget_alerting */
    public const budget_alerting = 'budget_alerting';
    #[Describe(['nullable' => true])]
    public ?UpdateBudgetBudgetBudgetAlerting $budget_alerting = null;
}
