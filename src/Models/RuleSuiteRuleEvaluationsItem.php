<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RuleSuiteRuleEvaluationsItem
{
    use DataModel;

    /** @see $rule_source */
    public const rule_source = 'rule_source';
    #[Describe(['nullable' => true])]
    public ?RuleSuiteRuleEvaluationsItemRuleSource $rule_source = null;

    /** @see $enforcement */
    public const enforcement = 'enforcement';
    #[Describe(['nullable' => true])]
    public ?RuleSuiteRuleEvaluationsItemEnforcement $enforcement = null;

    /** @see $result */
    public const result = 'result';
    #[Describe(['nullable' => true])]
    public ?RuleSuiteRuleEvaluationsItemResult $result = null;

    /** @see $rule_type */
    public const rule_type = 'rule_type';
    #[Describe(['nullable' => true])]
    public ?string $rule_type = null;

    /** @see $details */
    public const details = 'details';
    #[Describe(['nullable' => true])]
    public ?string $details = null;
}
