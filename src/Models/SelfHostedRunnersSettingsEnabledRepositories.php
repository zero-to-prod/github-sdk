<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The policy that controls whether self-hosted runners can be used by
 * repositories in the organization
 * @link https://docs.github.com/
 */
enum SelfHostedRunnersSettingsEnabledRepositories: string
{
    case unknown = 'unknown';
    case all = 'all';
    case selected = 'selected';
    case none = 'none';
}
