<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether the inclusion was defined at the organization or enterprise level
 * @link https://docs.github.com/
 */
enum OidcCustomPropertyInclusionInclusionSource: string
{
    case unknown = 'unknown';
    case organization = 'organization';
    case enterprise = 'enterprise';
}
