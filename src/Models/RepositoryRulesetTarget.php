<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The target of the ruleset
 * @link https://docs.github.com/
 */
enum RepositoryRulesetTarget: string
{
    case unknown = 'unknown';
    case branch = 'branch';
    case tag = 'tag';
    case push = 'push';
    case repository = 'repository';
}
