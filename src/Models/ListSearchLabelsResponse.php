<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListSearchLabelsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $incomplete_results */
    public const incomplete_results = 'incomplete_results';
    #[Describe(['nullable' => true])]
    public ?bool $incomplete_results = null;

    /** @see $items */
    public const items = 'items';
    /** @var array<int, LabelSearchResultItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => LabelSearchResultItem::class,
        'default' => [],
    ])]
    public array $items;
}
