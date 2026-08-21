<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsCacheUsageOrgEnterprise
{
    use DataModel;

    /** @see $total_active_caches_count */
    public const total_active_caches_count = 'total_active_caches_count';
    #[Describe(['nullable' => true])]
    public ?int $total_active_caches_count = null;

    /** @see $total_active_caches_size_in_bytes */
    public const total_active_caches_size_in_bytes = 'total_active_caches_size_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $total_active_caches_size_in_bytes = null;
}
