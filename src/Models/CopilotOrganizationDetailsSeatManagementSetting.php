<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The mode of assigning new seats.
 * @link https://docs.github.com/
 */
enum CopilotOrganizationDetailsSeatManagementSetting: string
{
    case unknown = 'unknown';
    case assign_all = 'assign_all';
    case assign_selected = 'assign_selected';
    case disabled = 'disabled';
    case unconfigured = 'unconfigured';
}
