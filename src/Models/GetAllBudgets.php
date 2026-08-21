<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetAllBudgets
{
    use DataModel;

    /** @see $budgets */
    public const budgets = 'budgets';
    /** @var array<int, Budget> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Budget::class,
        'default' => [],
    ])]
    public array $budgets;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;

    /** @see $effective_budget */
    public const effective_budget = 'effective_budget';
    #[Describe(['nullable' => true])]
    public ?GetAllBudgetsEffectiveBudget $effective_budget = null;

    /** @see $has_next_page */
    public const has_next_page = 'has_next_page';
    #[Describe(['nullable' => true])]
    public ?bool $has_next_page = null;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;
}
