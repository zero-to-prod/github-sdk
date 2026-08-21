<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * State of this codespace.
 * @link https://docs.github.com/
 */
enum CodespaceState: string
{
    case unknown = 'unknown';
    case Unknown = 'Unknown';
    case Created = 'Created';
    case Queued = 'Queued';
    case Provisioning = 'Provisioning';
    case Available = 'Available';
    case Awaiting = 'Awaiting';
    case Unavailable = 'Unavailable';
    case Deleted = 'Deleted';
    case Moved = 'Moved';
    case Shutdown = 'Shutdown';
    case Archived = 'Archived';
    case Starting = 'Starting';
    case ShuttingDown = 'ShuttingDown';
    case Failed = 'Failed';
    case Exporting = 'Exporting';
    case Updating = 'Updating';
    case Rebuilding = 'Rebuilding';
}
