<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCodespaceDevcontainersResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $devcontainers */
    public const devcontainers = 'devcontainers';
    /** @var array<int, ListRepoCodespaceDevcontainersResponseDevcontainersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ListRepoCodespaceDevcontainersResponseDevcontainersItem::class,
        'default' => [],
    ])]
    public array $devcontainers;
}
