<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Clone Traffic
 * @link https://docs.github.com/
 */
class CloneTraffic
{
    use DataModel;

    /** @see $count */
    public const count = 'count';
    #[Describe(['nullable' => true])]
    public ?int $count = null;

    /** @see $uniques */
    public const uniques = 'uniques';
    #[Describe(['nullable' => true])]
    public ?int $uniques = null;

    /** @see $clones */
    public const clones = 'clones';
    /** @var array<int, Traffic> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Traffic::class,
        'default' => [],
    ])]
    public array $clones;
}
