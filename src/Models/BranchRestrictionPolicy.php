<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Branch Restriction Policy
 * @link https://docs.github.com/
 */
class BranchRestrictionPolicy
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $users_url */
    public const users_url = 'users_url';
    #[Describe(['nullable' => true])]
    public ?string $users_url = null;

    /** @see $teams_url */
    public const teams_url = 'teams_url';
    #[Describe(['nullable' => true])]
    public ?string $teams_url = null;

    /** @see $apps_url */
    public const apps_url = 'apps_url';
    #[Describe(['nullable' => true])]
    public ?string $apps_url = null;

    /** @see $users */
    public const users = 'users';
    /** @var array<int, BranchRestrictionPolicyUsersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BranchRestrictionPolicyUsersItem::class,
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
    /** @var array<int, BranchRestrictionPolicyAppsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => BranchRestrictionPolicyAppsItem::class,
        'default' => [],
    ])]
    public array $apps;
}
