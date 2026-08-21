<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The category of the rule used to detect the finding.
 * @link https://docs.github.com/
 */
enum CodeQualityFindingRuleCategory: string
{
    case unknown = 'unknown';
    case none = 'none';
    case maintainability = 'maintainability';
    case reliability = 'reliability';
}
