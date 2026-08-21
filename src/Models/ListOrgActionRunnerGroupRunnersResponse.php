<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionRunnerGroupRunnersResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?float $total_count = null;

    /** @see $runners */
    public const runners = 'runners';
    /** @var array<int, Runner> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Runner::class,
        'default' => [],
    ])]
    public array $runners;
}
