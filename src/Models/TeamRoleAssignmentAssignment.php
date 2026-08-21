<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Determines if the team has a direct, indirect, or mixed relationship to a
 * role
 * @link https://docs.github.com/
 */
enum TeamRoleAssignmentAssignment: string
{
    case unknown = 'unknown';
    case direct = 'direct';
    case indirect = 'indirect';
    case mixed = 'mixed';
}
