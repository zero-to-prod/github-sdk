<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * How the team's access to the repository was granted. This property is only
 * present when the team is returned in a repository context, such as `GET
 * /repos/{owner}/{repo}/teams`.
 * @link https://docs.github.com/
 */
enum TeamAccessSource: string
{
    case unknown = 'unknown';
    case direct = 'direct';
    case organization = 'organization';
    case enterprise = 'enterprise';
}
