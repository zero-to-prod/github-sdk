<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateEnterpriseDependabotRepositoryAccessRequest
{
    use DataModel;

    /** @see $repository_ids_to_add */
    public const repository_ids_to_add = 'repository_ids_to_add';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $repository_ids_to_add;

    /** @see $repository_ids_to_remove */
    public const repository_ids_to_remove = 'repository_ids_to_remove';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $repository_ids_to_remove;
}
