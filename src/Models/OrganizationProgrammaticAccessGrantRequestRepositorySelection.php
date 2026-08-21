<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Type of repository selection requested.
 * @link https://docs.github.com/
 */
enum OrganizationProgrammaticAccessGrantRequestRepositorySelection: string
{
    case unknown = 'unknown';
    case none = 'none';
    case all = 'all';
    case subset = 'subset';
}
