<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The ownership type of the team
 * @link https://docs.github.com/
 */
enum NullableTeamSimpleType: string
{
    case unknown = 'unknown';
    case enterprise = 'enterprise';
    case organization = 'organization';
}
