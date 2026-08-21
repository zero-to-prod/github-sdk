<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The default workflow permissions granted to the GITHUB_TOKEN when running
 * workflows.
 * @link https://docs.github.com/
 */
enum ActionsDefaultWorkflowPermissions: string
{
    case unknown = 'unknown';
    case read = 'read';
    case write = 'write';
}
