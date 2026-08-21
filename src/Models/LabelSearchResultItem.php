<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Label Search Result Item
 * @link https://docs.github.com/
 */
class LabelSearchResultItem
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $color */
    public const color = 'color';
    #[Describe(['nullable' => true])]
    public ?string $color = null;

    /** @see $default */
    public const default = 'default';
    #[Describe(['nullable' => true])]
    public ?bool $default = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;

    /** @see $text_matches */
    public const text_matches = 'text_matches';
    /** @var array<int, SearchResultTextMatchesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SearchResultTextMatchesItem::class,
        'default' => [],
    ])]
    public array $text_matches;
}
