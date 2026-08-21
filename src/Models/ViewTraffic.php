<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * View Traffic
 * @link https://docs.github.com/
 */
class ViewTraffic
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

    /** @see $views */
    public const views = 'views';
    /** @var array<int, Traffic> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Traffic::class,
        'default' => [],
    ])]
    public array $views;
}
