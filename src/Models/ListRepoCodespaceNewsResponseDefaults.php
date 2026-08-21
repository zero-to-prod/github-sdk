<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCodespaceNewsResponseDefaults
{
    use DataModel;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $devcontainer_path */
    public const devcontainer_path = 'devcontainer_path';
    #[Describe(['nullable' => true])]
    public ?string $devcontainer_path = null;
}
