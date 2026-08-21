<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Group of enterprise owners and/or members
 * @link https://docs.github.com/
 */
class EnterpriseTeam
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $sync_to_organizations */
    public const sync_to_organizations = 'sync_to_organizations';
    #[Describe(['nullable' => true])]
    public ?string $sync_to_organizations = null;

    /** @see $organization_selection_type */
    public const organization_selection_type = 'organization_selection_type';
    #[Describe(['nullable' => true])]
    public ?string $organization_selection_type = null;

    /** @see $group_id */
    public const group_id = 'group_id';
    #[Describe(['nullable' => true])]
    public ?string $group_id = null;

    /** @see $group_name */
    public const group_name = 'group_name';
    #[Describe(['nullable' => true])]
    public ?string $group_name = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $members_url */
    public const members_url = 'members_url';
    #[Describe(['nullable' => true])]
    public ?string $members_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $notification_setting */
    public const notification_setting = 'notification_setting';
    #[Describe(['nullable' => true])]
    public ?EnterpriseTeamNotificationSetting $notification_setting = null;
}
