<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RateLimit
{
    use DataModel;

    /** @see $limit */
    public const limit = 'limit';
    #[Describe(['nullable' => true])]
    public ?int $limit = null;

    /** @see $remaining */
    public const remaining = 'remaining';
    #[Describe(['nullable' => true])]
    public ?int $remaining = null;

    /** @see $reset */
    public const reset = 'reset';
    #[Describe(['nullable' => true])]
    public ?int $reset = null;

    /** @see $used */
    public const used = 'used';
    #[Describe(['nullable' => true])]
    public ?int $used = null;
}
