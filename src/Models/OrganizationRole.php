<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Organization roles
 * @link https://docs.github.com/
 */
class OrganizationRole
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

    /** @see $base_role */
    public const base_role = 'base_role';
    #[Describe(['nullable' => true])]
    public ?OrganizationRoleBaseRole $base_role = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?OrganizationRoleSource $source = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $permissions;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $organization = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
