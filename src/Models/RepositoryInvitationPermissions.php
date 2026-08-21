<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The permission associated with the invitation.
 * @link https://docs.github.com/
 */
enum RepositoryInvitationPermissions: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
    case admin = 'admin';
    case triage = 'triage';
    case maintain = 'maintain';
}
