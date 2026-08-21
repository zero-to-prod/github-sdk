<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A list of active concurrency groups for a repository.
 * @link https://docs.github.com/
 */
class ConcurrencyGroupList
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $concurrency_groups */
    public const concurrency_groups = 'concurrency_groups';
    /** @var array<int, ConcurrencyGroupListConcurrencyGroupsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ConcurrencyGroupListConcurrencyGroupsItem::class,
        'default' => [],
    ])]
    public array $concurrency_groups;
}
