<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class OrganizationFullPlan
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $space */
    public const space = 'space';
    #[Describe(['nullable' => true])]
    public ?int $space = null;

    /** @see $private_repos */
    public const private_repos = 'private_repos';
    #[Describe(['nullable' => true])]
    public ?int $private_repos = null;

    /** @see $filled_seats */
    public const filled_seats = 'filled_seats';
    #[Describe(['nullable' => true])]
    public ?int $filled_seats = null;

    /** @see $seats */
    public const seats = 'seats';
    #[Describe(['nullable' => true])]
    public ?int $seats = null;
}
