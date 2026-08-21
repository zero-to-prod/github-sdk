<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Specifies which types of repository this security configuration is applied
 * to by default.
 * @link https://docs.github.com/
 */
enum UpdateEnterpriseCodeSecurityConfigurationDefaultResponseDefaultForNewRepos: string
{
    case unknown = 'unknown';
    case all = 'all';
    case none = 'none';
    case private_and_internal = 'private_and_internal';
    case public = 'public';
}
