<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateTeamMembershipRequest
{
    use DataModel;

    /** @see $role */
    public const role = 'role';
    #[Describe(['nullable' => true])]
    public ?TeamMemberRole $role = null;
}
