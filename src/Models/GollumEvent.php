<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GollumEvent
{
    use DataModel;

    /** @see $pages */
    public const pages = 'pages';
    /** @var array<int, GollumEventPagesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GollumEventPagesItem::class,
        'default' => [],
    ])]
    public array $pages;
}
