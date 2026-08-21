<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Organization Invitation
 * @link https://docs.github.com/
 */
class OrganizationInvitation
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $role */
    public const role = 'role';
    #[Describe(['nullable' => true])]
    public ?string $role = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $failed_at */
    public const failed_at = 'failed_at';
    #[Describe(['nullable' => true])]
    public ?string $failed_at = null;

    /** @see $failed_reason */
    public const failed_reason = 'failed_reason';
    #[Describe(['nullable' => true])]
    public ?string $failed_reason = null;

    /** @see $inviter */
    public const inviter = 'inviter';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $inviter = null;

    /** @see $team_count */
    public const team_count = 'team_count';
    #[Describe(['nullable' => true])]
    public ?int $team_count = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $invitation_teams_url */
    public const invitation_teams_url = 'invitation_teams_url';
    #[Describe(['nullable' => true])]
    public ?string $invitation_teams_url = null;

    /** @see $invitation_source */
    public const invitation_source = 'invitation_source';
    #[Describe(['nullable' => true])]
    public ?string $invitation_source = null;
}
