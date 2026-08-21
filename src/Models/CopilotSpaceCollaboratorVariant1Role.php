<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The role granted to the collaborator
 * @link https://docs.github.com/
 */
enum CopilotSpaceCollaboratorVariant1Role: string
{
    case unknown = 'unknown';
    case reader = 'reader';
    case writer = 'writer';
    case admin = 'admin';
}
