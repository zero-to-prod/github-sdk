<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The severity of the rule used to detect the finding.
 * @link https://docs.github.com/
 */
enum CodeQualityFindingRuleSeverity: string
{
    case unknown = 'unknown';
    case error = 'error';
    case warning = 'warning';
    case note = 'note';
    case none = 'none';
}
