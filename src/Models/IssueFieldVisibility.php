<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The visibility of the issue field. Can be `organization_members_only`
 * (visible only within the organization) or `all` (visible to all users who
 * can see issues).
 * @link https://docs.github.com/
 */
enum IssueFieldVisibility: string
{
    case unknown = 'unknown';
    case organization_members_only = 'organization_members_only';
    case all = 'all';
}
