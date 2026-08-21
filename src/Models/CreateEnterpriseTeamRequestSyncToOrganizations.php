<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Retired: this field is no longer supported. Whether the enterprise team
 * should be reflected in each organization. This value cannot be set.
 * @link https://docs.github.com/
 */
enum CreateEnterpriseTeamRequestSyncToOrganizations: string
{
    case unknown = 'unknown';
    case all = 'all';
    case disabled = 'disabled';
}
