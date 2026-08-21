<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Effective user-level budget details returned when the response is scoped
 * with the `user` query parameter.
 * @link https://docs.github.com/
 */
class GetAllBudgetsEffectiveBudget
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $budget_amount */
    public const budget_amount = 'budget_amount';
    #[Describe(['nullable' => true])]
    public ?int $budget_amount = null;

    /** @see $consumed_amount */
    public const consumed_amount = 'consumed_amount';
    #[Describe(['nullable' => true])]
    public ?float $consumed_amount = null;
}
