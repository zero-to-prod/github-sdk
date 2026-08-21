<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCheckSuiteCheckRunsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $check_runs */
    public const check_runs = 'check_runs';
    /** @var array<int, CheckRun> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CheckRun::class,
        'default' => [],
    ])]
    public array $check_runs;
}
