<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The permissions that the associated user will have on the repository.
 * Valid values are `read`, `write`, `maintain`, `triage`, and `admin`.
 * @link https://docs.github.com/
 */
enum UpdateRepoInvitationRequestPermissions: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
    case maintain = 'maintain';
    case triage = 'triage';
    case admin = 'admin';
}
