<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateEnterpriseTeamRequest
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

    /** @see $sync_to_organizations */
    public const sync_to_organizations = 'sync_to_organizations';
    #[Describe(['nullable' => true])]
    public ?CreateEnterpriseTeamRequestSyncToOrganizations $sync_to_organizations = null;

    /** @see $organization_selection_type */
    public const organization_selection_type = 'organization_selection_type';
    #[Describe(['nullable' => true])]
    public ?CreateEnterpriseTeamRequestOrganizationSelectionType $organization_selection_type = null;

    /** @see $group_id */
    public const group_id = 'group_id';
    #[Describe(['nullable' => true])]
    public ?string $group_id = null;

    /** @see $notification_setting */
    public const notification_setting = 'notification_setting';
    #[Describe(['nullable' => true])]
    public ?EnterpriseTeamNotificationSetting $notification_setting = null;
}
