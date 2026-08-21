<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Allow specific users, teams, or apps to bypass pull request requirements.
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequestRequiredPullRequestReviewsBypassPullRequestAllowances
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
