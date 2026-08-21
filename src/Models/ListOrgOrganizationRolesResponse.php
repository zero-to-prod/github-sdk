<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgOrganizationRolesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $roles */
    public const roles = 'roles';
    /** @var array<int, OrganizationRole> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrganizationRole::class,
        'default' => [],
    ])]
    public array $roles;
}
