<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The result of the evaluation of the individual rule.
 * @link https://docs.github.com/
 */
enum RuleSuiteRuleEvaluationsItemResult: string
{
    case unknown = 'unknown';
    case pass = 'pass';
    case fail = 'fail';
}
