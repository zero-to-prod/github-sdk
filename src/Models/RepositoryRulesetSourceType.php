<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of the source of the ruleset
 * @link https://docs.github.com/
 */
enum RepositoryRulesetSourceType: string
{
    case unknown = 'unknown';
    case Repository = 'Repository';
    case Organization = 'Organization';
    case Enterprise = 'Enterprise';
}
