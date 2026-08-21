<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The level of privacy this team should have. The options are: **For a
 * non-nested team:** * `secret` - only visible to organization owners and
 * members of this team. * `closed` - visible to all members of this
 * organization. Default: `secret` **For a parent or child team:** * `closed`
 * - visible to all members of this organization. Default for child team:
 * `closed`
 * @link https://docs.github.com/
 */
enum CreateOrgTeamRequestPrivacy: string
{
    case unknown = 'unknown';
    case secret = 'secret';
    case closed = 'closed';
}
