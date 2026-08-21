<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether it's a group assignment or individual assignment.
 * @link https://docs.github.com/
 */
enum ClassroomAssignmentType: string
{
    case unknown = 'unknown';
    case individual = 'individual';
    case group = 'group';
}
