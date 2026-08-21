<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Minimal representation of an organization programmatic access grant for
 * enumerations
 * @link https://docs.github.com/
 */
class OrganizationProgrammaticAccessGrant
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['default' => OrganizationProgrammaticAccessGrantRequestRepositorySelection::unknown])]
    public OrganizationProgrammaticAccessGrantRequestRepositorySelection $repository_selection;

    /** @see $repositories_url */
    public const repositories_url = 'repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $repositories_url = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?OrganizationProgrammaticAccessGrantPermissions $permissions = null;

    /** @see $access_granted_at */
    public const access_granted_at = 'access_granted_at';
    #[Describe(['nullable' => true])]
    public ?string $access_granted_at = null;

    /** @see $token_id */
    public const token_id = 'token_id';
    #[Describe(['nullable' => true])]
    public ?int $token_id = null;

    /** @see $token_name */
    public const token_name = 'token_name';
    #[Describe(['nullable' => true])]
    public ?string $token_name = null;

    /** @see $token_expired */
    public const token_expired = 'token_expired';
    #[Describe(['nullable' => true])]
    public ?bool $token_expired = null;

    /** @see $token_expires_at */
    public const token_expires_at = 'token_expires_at';
    #[Describe(['nullable' => true])]
    public ?string $token_expires_at = null;

    /** @see $token_last_used_at */
    public const token_last_used_at = 'token_last_used_at';
    #[Describe(['nullable' => true])]
    public ?string $token_last_used_at = null;
}
