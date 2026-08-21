<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Visibility of a runner group. You can select all repositories, select
 * individual repositories, or limit access to private repositories.
 * @link https://docs.github.com/
 */
enum CreateOrgActionRunnerGroupRequestVisibility: string
{
    case unknown = 'unknown';
    case selected = 'selected';
    case all = 'all';
    case private = 'private';
}
