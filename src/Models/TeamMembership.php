<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Team Membership
 * @link https://docs.github.com/
 */
class TeamMembership
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $role */
    public const role = 'role';
    #[Describe(['default' => TeamMemberRole::unknown])]
    public TeamMemberRole $role;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => OrgMembershipState::unknown])]
    public OrgMembershipState $state;
}
