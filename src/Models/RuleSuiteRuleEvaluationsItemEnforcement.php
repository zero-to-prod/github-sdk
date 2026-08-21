<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The enforcement level of this rule source.
 * @link https://docs.github.com/
 */
enum RuleSuiteRuleEvaluationsItemEnforcement: string
{
    case unknown = 'unknown';
    case active = 'active';
    case evaluate = 'evaluate';
    case deleted_ruleset = 'deleted ruleset';
}
