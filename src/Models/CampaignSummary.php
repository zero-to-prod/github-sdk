<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The campaign metadata and alert stats.
 * @link https://docs.github.com/
 */
class CampaignSummary
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $managers */
    public const managers = 'managers';
    /** @var array<int, SimpleUser> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleUser::class,
        'default' => [],
    ])]
    public array $managers;

    /** @see $team_managers */
    public const team_managers = 'team_managers';
    /** @var array<int, Team> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Team::class,
        'default' => [],
    ])]
    public array $team_managers;

    /** @see $published_at */
    public const published_at = 'published_at';
    #[Describe(['nullable' => true])]
    public ?string $published_at = null;

    /** @see $ends_at */
    public const ends_at = 'ends_at';
    #[Describe(['nullable' => true])]
    public ?string $ends_at = null;

    /** @see $closed_at */
    public const closed_at = 'closed_at';
    #[Describe(['nullable' => true])]
    public ?string $closed_at = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => CampaignState::unknown])]
    public CampaignState $state;

    /** @see $contact_link */
    public const contact_link = 'contact_link';
    #[Describe(['nullable' => true])]
    public ?string $contact_link = null;

    /** @see $alert_stats */
    public const alert_stats = 'alert_stats';
    #[Describe(['nullable' => true])]
    public ?CampaignSummaryAlertStats $alert_stats = null;
}
