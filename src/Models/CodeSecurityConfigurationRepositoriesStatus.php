<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The attachment status of the code security configuration on the
 * repository.
 * @link https://docs.github.com/
 */
enum CodeSecurityConfigurationRepositoriesStatus: string
{
    case unknown = 'unknown';
    case attached = 'attached';
    case attaching = 'attaching';
    case detached = 'detached';
    case removed = 'removed';
    case enforced = 'enforced';
    case failed = 'failed';
    case updating = 'updating';
    case removed_by_enterprise = 'removed_by_enterprise';
}
