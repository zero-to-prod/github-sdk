<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class IssueDependenciesSummary
{
    use DataModel;

    /** @see $blocked_by */
    public const blocked_by = 'blocked_by';
    #[Describe(['nullable' => true])]
    public ?int $blocked_by = null;

    /** @see $blocking */
    public const blocking = 'blocking';
    #[Describe(['nullable' => true])]
    public ?int $blocking = null;

    /** @see $total_blocked_by */
    public const total_blocked_by = 'total_blocked_by';
    #[Describe(['nullable' => true])]
    public ?int $total_blocked_by = null;

    /** @see $total_blocking */
    public const total_blocking = 'total_blocking';
    #[Describe(['nullable' => true])]
    public ?int $total_blocking = null;
}
