<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub resource (pull request, issue, etc.)
 * @link https://docs.github.com/
 */
class ListAgentRepoTasksResponseTasksItemArtifactsItemDataVariant1
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $global_id */
    public const global_id = 'global_id';
    #[Describe(['nullable' => true])]
    public ?string $global_id = null;
}
