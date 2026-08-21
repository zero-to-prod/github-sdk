<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository invitations let you manage who you collaborate with.
 * @link https://docs.github.com/
 */
class RepositoryInvitation
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $invitee */
    public const invitee = 'invitee';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $invitee = null;

    /** @see $inviter */
    public const inviter = 'inviter';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $inviter = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['default' => RepositoryInvitationPermissions::unknown])]
    public RepositoryInvitationPermissions $permissions;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $expired */
    public const expired = 'expired';
    #[Describe(['nullable' => true])]
    public ?bool $expired = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;
}
