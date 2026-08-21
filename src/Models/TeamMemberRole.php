<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The member's role on the team. Only present on the `List team members`
 * endpoint, and only when the feature is enabled for the organization.
 * @link https://docs.github.com/
 */
enum TeamMemberRole: string
{
    case unknown = 'unknown';
    case member = 'member';
    case maintainer = 'maintainer';
}
