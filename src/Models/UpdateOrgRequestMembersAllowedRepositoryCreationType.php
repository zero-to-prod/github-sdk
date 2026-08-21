<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Specifies which types of repositories non-admin organization members can
 * create. `private` is only available to repositories that are part of an
 * organization on GitHub Enterprise Cloud. **Note:** This parameter is
 * closing down and will be removed in the future. Its return value ignores
 * internal repositories. Using this parameter overrides values set in
 * `members_can_create_repositories`. See the parameter deprecation notice in
 * the operation description for details.
 * @link https://docs.github.com/
 */
enum UpdateOrgRequestMembersAllowedRepositoryCreationType: string
{
    case unknown = 'unknown';
    case all = 'all';
    case private = 'private';
    case none = 'none';
}
