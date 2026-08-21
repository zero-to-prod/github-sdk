<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Allow specific users, teams, or apps to bypass pull request requirements.
 * @link https://docs.github.com/
 */
class ProtectedBranchPullRequestReviewBypassPullRequestAllowances
{
    use DataModel;

    /** @see $users */
    public const users = 'users';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $users;

    /** @see $teams */
    public const teams = 'teams';
    /** @var array<int, Team> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Team::class,
        'default' => [],
    ])]
    public array $teams;

    /** @see $apps */
    public const apps = 'apps';
    /** @var array<int, Integration> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Integration::class,
        'default' => [],
    ])]
    public array $apps;
}
