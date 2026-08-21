<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Specifies which organizations in the enterprise should have access to this
 * team. Can be one of `disabled`, `selected`, or `all`. `disabled`: The team
 * is not assigned to any organizations. This is the default when you create
 * a new team. `selected`: The team is assigned to specific organizations.
 * You can then use the [add organization assignments
 * API](https://docs.github.com/rest/enterprise-teams/enterprise-team-organizations#add-organization-assignments)
 * endpoint. `all`: The team is assigned to all current and future
 * organizations in the enterprise.
 * @link https://docs.github.com/
 */
enum CreateEnterpriseTeamRequestOrganizationSelectionType: string
{
    case unknown = 'unknown';
    case disabled = 'disabled';
    case selected = 'selected';
    case all = 'all';
}
