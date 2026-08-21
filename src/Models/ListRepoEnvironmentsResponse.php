<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoEnvironmentsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $environments */
    public const environments = 'environments';
    /** @var array<int, Environment> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Environment::class,
        'default' => [],
    ])]
    public array $environments;
}
