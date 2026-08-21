<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoCommitCheckSuitesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $check_suites */
    public const check_suites = 'check_suites';
    /** @var array<int, CheckSuite> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CheckSuite::class,
        'default' => [],
    ])]
    public array $check_suites;
}
