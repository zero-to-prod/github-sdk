<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum CreateOrgMigrationRequestExcludeItem: string
{
    case unknown = 'unknown';
    case repositories = 'repositories';
}
