<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository Collaborator Permission
 * @link https://docs.github.com/
 */
class RepositoryCollaboratorPermission
{
    use DataModel;

    /** @see $permission */
    public const permission = 'permission';
    #[Describe(['nullable' => true])]
    public ?string $permission = null;

    /** @see $role_name */
    public const role_name = 'role_name';
    #[Describe(['nullable' => true])]
    public ?string $role_name = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?Collaborator $user = null;
}
