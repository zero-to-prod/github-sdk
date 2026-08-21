<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Restrict who can push to the protected branch. User, app, and team
 * `restrictions` are only available for organization-owned repositories. Set
 * to `null` to disable.
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequestRestrictions
{
    use DataModel;

    /** @see $users */
    public const users = 'users';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $users;

    /** @see $teams */
    public const teams = 'teams';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $teams;

    /** @see $apps */
    public const apps = 'apps';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $apps;
}
