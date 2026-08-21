<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgInvitationRequest
{
    use DataModel;

    /** @see $invitee_id */
    public const invitee_id = 'invitee_id';
    #[Describe(['nullable' => true])]
    public ?int $invitee_id = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $role */
    public const role = 'role';
    #[Describe(['nullable' => true])]
    public ?CreateOrgInvitationRequestRole $role = null;

    /** @see $team_ids */
    public const team_ids = 'team_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $team_ids;
}
