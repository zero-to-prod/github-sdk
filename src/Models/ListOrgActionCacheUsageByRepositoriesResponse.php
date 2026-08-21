<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionCacheUsageByRepositoriesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $repository_cache_usages */
    public const repository_cache_usages = 'repository_cache_usages';
    /** @var array<int, ActionsCacheUsageByRepository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsCacheUsageByRepository::class,
        'default' => [],
    ])]
    public array $repository_cache_usages;
}
