<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Code quality rule
 * @link https://docs.github.com/
 */
class CodeQualityFindingRule
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $help */
    public const help = 'help';
    #[Describe(['nullable' => true])]
    public ?string $help = null;

    /** @see $severity */
    public const severity = 'severity';
    #[Describe(['default' => CodeQualityFindingRuleSeverity::unknown])]
    public CodeQualityFindingRuleSeverity $severity;

    /** @see $category */
    public const category = 'category';
    #[Describe(['default' => CodeQualityFindingRuleCategory::unknown])]
    public CodeQualityFindingRuleCategory $category;
}
