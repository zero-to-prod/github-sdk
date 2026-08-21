<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Which users can access codespaces in the organization. `disabled` means
 * that no users can access codespaces in the organization.
 * @link https://docs.github.com/
 */
enum UpdateOrgCodespaceAccessRequestVisibility: string
{
    case unknown = 'unknown';
    case disabled = 'disabled';
    case selected_members = 'selected_members';
    case all_members = 'all_members';
    case all_members_and_outside_collaborators = 'all_members_and_outside_collaborators';
}
