<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class OrgMembershipPermissions
{
    use DataModel;

    /** @see $can_create_repository */
    public const can_create_repository = 'can_create_repository';
    #[Describe(['nullable' => true])]
    public ?bool $can_create_repository = null;
}
