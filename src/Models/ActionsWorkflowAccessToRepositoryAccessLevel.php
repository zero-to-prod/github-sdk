<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Defines the level of access that workflows outside of the repository have
 * to actions and reusable workflows within the repository. `none` means the
 * access is only possible from workflows in this repository. `user` level
 * access allows sharing across user owned private repositories only.
 * `organization` level access allows sharing across the organization.
 * @link https://docs.github.com/
 */
enum ActionsWorkflowAccessToRepositoryAccessLevel: string
{
    case unknown = 'unknown';
    case none = 'none';
    case user = 'user';
    case organization = 'organization';
}
