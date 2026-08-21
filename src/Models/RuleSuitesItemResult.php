<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The result of the rule evaluations for rules with the `active` enforcement
 * status.
 * @link https://docs.github.com/
 */
enum RuleSuitesItemResult: string
{
    case unknown = 'unknown';
    case pass = 'pass';
    case fail = 'fail';
    case bypass = 'bypass';
}
