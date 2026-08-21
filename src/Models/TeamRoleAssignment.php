<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The Relationship a Team has with a role.
 * @link https://docs.github.com/
 */
class TeamRoleAssignment
{
    use DataModel;

    /** @see $assignment */
    public const assignment = 'assignment';
    #[Describe(['nullable' => true])]
    public ?TeamRoleAssignmentAssignment $assignment = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $privacy */
    public const privacy = 'privacy';
    #[Describe(['nullable' => true])]
    public ?string $privacy = null;

    /** @see $notification_setting */
    public const notification_setting = 'notification_setting';
    #[Describe(['nullable' => true])]
    public ?string $notification_setting = null;

    /** @see $permission */
    public const permission = 'permission';
    #[Describe(['nullable' => true])]
    public ?string $permission = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?TeamRoleAssignmentPermissions $permissions = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $members_url */
    public const members_url = 'members_url';
    #[Describe(['nullable' => true])]
    public ?string $members_url = null;

    /** @see $repositories_url */
    public const repositories_url = 'repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $repositories_url = null;

    /** @see $parent */
    public const parent = 'parent';
    #[Describe(['nullable' => true])]
    public ?TeamSimple $parent = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['default' => NullableTeamSimpleType::unknown])]
    public NullableTeamSimpleType $type;

    /** @see $organization_id */
    public const organization_id = 'organization_id';
    #[Describe(['nullable' => true])]
    public ?int $organization_id = null;

    /** @see $enterprise_id */
    public const enterprise_id = 'enterprise_id';
    #[Describe(['nullable' => true])]
    public ?int $enterprise_id = null;
}
