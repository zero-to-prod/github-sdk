<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * GitHub Actions Cache Usage by repository.
 * @link https://docs.github.com/
 */
class ActionsCacheUsageByRepository
{
    use DataModel;

    /** @see $full_name */
    public const full_name = 'full_name';
    #[Describe(['nullable' => true])]
    public ?string $full_name = null;

    /** @see $active_caches_size_in_bytes */
    public const active_caches_size_in_bytes = 'active_caches_size_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $active_caches_size_in_bytes = null;

    /** @see $active_caches_count */
    public const active_caches_count = 'active_caches_count';
    #[Describe(['nullable' => true])]
    public ?int $active_caches_count = null;
}
