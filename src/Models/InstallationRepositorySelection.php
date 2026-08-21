<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Describe whether all repositories have been selected or there's a
 * selection involved
 * @link https://docs.github.com/
 */
enum InstallationRepositorySelection: string
{
    case unknown = 'unknown';
    case all = 'all';
    case selected = 'selected';
}
