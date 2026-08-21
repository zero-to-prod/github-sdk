<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionRunnerGroupsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?float $total_count = null;

    /** @see $runner_groups */
    public const runner_groups = 'runner_groups';
    /** @var array<int, RunnerGroupsOrg> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RunnerGroupsOrg::class,
        'default' => [],
    ])]
    public array $runner_groups;
}
