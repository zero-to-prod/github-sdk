<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Org Membership
 * @link https://docs.github.com/
 */
class OrgMembership
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => OrgMembershipState::unknown])]
    public OrgMembershipState $state;

    /** @see $role */
    public const role = 'role';
    #[Describe(['default' => OrgMembershipRole::unknown])]
    public OrgMembershipRole $role;

    /** @see $direct_membership */
    public const direct_membership = 'direct_membership';
    #[Describe(['nullable' => true])]
    public ?bool $direct_membership = null;

    /** @see $enterprise_teams_providing_indirect_membership */
    public const enterprise_teams_providing_indirect_membership = 'enterprise_teams_providing_indirect_membership';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $enterprise_teams_providing_indirect_membership;

    /** @see $organization_url */
    public const organization_url = 'organization_url';
    #[Describe(['nullable' => true])]
    public ?string $organization_url = null;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?OrganizationSimple $organization = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?OrgMembershipPermissions $permissions = null;
}
