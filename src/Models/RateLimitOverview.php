<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Rate Limit Overview
 * @link https://docs.github.com/
 */
class RateLimitOverview
{
    use DataModel;

    /** @see $resources */
    public const resources = 'resources';
    #[Describe(['nullable' => true])]
    public ?RateLimitOverviewResources $resources = null;

    /** @see $rate */
    public const rate = 'rate';
    #[Describe(['nullable' => true])]
    public ?RateLimit $rate = null;
}
