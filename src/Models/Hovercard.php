<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Hovercard
 * @link https://docs.github.com/
 */
class Hovercard
{
    use DataModel;

    /** @see $contexts */
    public const contexts = 'contexts';
    /** @var array<int, HovercardContextsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => HovercardContextsItem::class,
        'default' => [],
    ])]
    public array $contexts;
}
