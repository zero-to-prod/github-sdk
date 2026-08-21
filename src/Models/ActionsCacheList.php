<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Repository actions caches
 * @link https://docs.github.com/
 */
class ActionsCacheList
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $actions_caches */
    public const actions_caches = 'actions_caches';
    /** @var array<int, ActionsCacheListActionsCachesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsCacheListActionsCachesItem::class,
        'default' => [],
    ])]
    public array $actions_caches;
}
