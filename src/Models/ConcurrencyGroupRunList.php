<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A list of concurrency groups associated with a workflow run.
 * @link https://docs.github.com/
 */
class ConcurrencyGroupRunList
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $concurrency_groups */
    public const concurrency_groups = 'concurrency_groups';
    /** @var array<int, ConcurrencyGroupRunListConcurrencyGroupsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ConcurrencyGroupRunListConcurrencyGroupsItem::class,
        'default' => [],
    ])]
    public array $concurrency_groups;
}
