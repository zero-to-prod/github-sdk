<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * GitHub Actions cache retention policy for an enterprise.
 * @link https://docs.github.com/
 */
class ActionsCacheRetentionLimitForEnterprise
{
    use DataModel;

    /** @see $max_cache_retention_days */
    public const max_cache_retention_days = 'max_cache_retention_days';
    #[Describe(['nullable' => true])]
    public ?int $max_cache_retention_days = null;
}
