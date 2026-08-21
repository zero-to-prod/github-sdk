<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCampaignRequest
{
    use DataModel;

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
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $managers;

    /** @see $team_managers */
    public const team_managers = 'team_managers';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $team_managers;

    /** @see $ends_at */
    public const ends_at = 'ends_at';
    #[Describe(['nullable' => true])]
    public ?string $ends_at = null;

    /** @see $contact_link */
    public const contact_link = 'contact_link';
    #[Describe(['nullable' => true])]
    public ?string $contact_link = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?CampaignState $state = null;
}
