<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PublicUserPlan
{
    use DataModel;

    /** @see $collaborators */
    public const collaborators = 'collaborators';
    #[Describe(['nullable' => true])]
    public ?int $collaborators = null;

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
}
