<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of actor that can bypass a ruleset.
 * @link https://docs.github.com/
 */
enum RepositoryRulesetBypassActorActorType: string
{
    case unknown = 'unknown';
    case Integration = 'Integration';
    case OrganizationAdmin = 'OrganizationAdmin';
    case RepositoryRole = 'RepositoryRole';
    case Team = 'Team';
    case DeployKey = 'DeployKey';
    case User = 'User';
}
