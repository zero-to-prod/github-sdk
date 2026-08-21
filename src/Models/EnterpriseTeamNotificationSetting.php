<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Whether team members will receive notifications when the team is
 * mentioned.
 * @link https://docs.github.com/
 */
enum EnterpriseTeamNotificationSetting: string
{
    case unknown = 'unknown';
    case notifications_enabled = 'notifications_enabled';
    case notifications_disabled = 'notifications_disabled';
}
