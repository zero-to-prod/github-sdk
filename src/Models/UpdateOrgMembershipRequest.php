<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgMembershipRequest
{
    use DataModel;

    /** @see $role */
    public const role = 'role';
    #[Describe(['nullable' => true])]
    public ?UpdateOrgMembershipRequestRole $role = null;
}
