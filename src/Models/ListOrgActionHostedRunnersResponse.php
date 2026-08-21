<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionHostedRunnersResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $runners */
    public const runners = 'runners';
    /** @var array<int, ActionsHostedRunner> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsHostedRunner::class,
        'default' => [],
    ])]
    public array $runners;
}
