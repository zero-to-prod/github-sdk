<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Specify which users, teams, and apps can dismiss pull request reviews.
 * Pass an empty `dismissal_restrictions` object to disable. User and team
 * `dismissal_restrictions` are only available for organization-owned
 * repositories. Omit this parameter for personal repositories.
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequestRequiredPullRequestReviewsDismissalRestrictions
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
