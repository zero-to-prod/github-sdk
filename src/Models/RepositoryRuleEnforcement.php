<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The enforcement level of the ruleset. `evaluate` allows admins to test
 * rules before enforcing them. Admins can view insights on the Rule Insights
 * page (`evaluate` is only available with GitHub Enterprise).
 * @link https://docs.github.com/
 */
enum RepositoryRuleEnforcement: string
{
    case unknown = 'unknown';
    case disabled = 'disabled';
    case active = 'active';
    case evaluate = 'evaluate';
}
