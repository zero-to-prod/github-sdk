<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * GitHub Actions cache storage policy for an enterprise.
 * @link https://docs.github.com/
 */
class ActionsCacheStorageLimitForEnterprise
{
    use DataModel;

    /** @see $max_cache_size_gb */
    public const max_cache_size_gb = 'max_cache_size_gb';
    #[Describe(['nullable' => true])]
    public ?int $max_cache_size_gb = null;
}
