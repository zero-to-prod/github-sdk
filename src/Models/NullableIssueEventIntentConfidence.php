<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The confidence level the agent had when performing this action.
 * @link https://docs.github.com/
 */
enum NullableIssueEventIntentConfidence: string
{
    case unknown = 'unknown';
    case LOW = 'LOW';
    case MEDIUM = 'MEDIUM';
    case HIGH = 'HIGH';
}
