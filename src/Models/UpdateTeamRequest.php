<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateTeamRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $privacy */
    public const privacy = 'privacy';
    #[Describe(['nullable' => true])]
    public ?CreateOrgTeamRequestPrivacy $privacy = null;

    /** @see $notification_setting */
    public const notification_setting = 'notification_setting';
    #[Describe(['nullable' => true])]
    public ?EnterpriseTeamNotificationSetting $notification_setting = null;

    /** @see $permission */
    public const permission = 'permission';
    #[Describe(['nullable' => true])]
    public ?UpdateOrgTeamRequestPermission $permission = null;

    /** @see $parent_team_id */
    public const parent_team_id = 'parent_team_id';
    #[Describe(['nullable' => true])]
    public ?int $parent_team_id = null;

    /** @see $parent_team_slug */
    public const parent_team_slug = 'parent_team_slug';
    #[Describe(['nullable' => true])]
    public ?string $parent_team_slug = null;
}
