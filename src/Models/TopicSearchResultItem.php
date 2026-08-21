<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Topic Search Result Item
 * @link https://docs.github.com/
 */
class TopicSearchResultItem
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $short_description */
    public const short_description = 'short_description';
    #[Describe(['nullable' => true])]
    public ?string $short_description = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $created_by */
    public const created_by = 'created_by';
    #[Describe(['nullable' => true])]
    public ?string $created_by = null;

    /** @see $released */
    public const released = 'released';
    #[Describe(['nullable' => true])]
    public ?string $released = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $featured */
    public const featured = 'featured';
    #[Describe(['nullable' => true])]
    public ?bool $featured = null;

    /** @see $curated */
    public const curated = 'curated';
    #[Describe(['nullable' => true])]
    public ?bool $curated = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;

    /** @see $repository_count */
    public const repository_count = 'repository_count';
    #[Describe(['nullable' => true])]
    public ?int $repository_count = null;

    /** @see $logo_url */
    public const logo_url = 'logo_url';
    #[Describe(['nullable' => true])]
    public ?string $logo_url = null;

    /** @see $text_matches */
    public const text_matches = 'text_matches';
    /** @var array<int, SearchResultTextMatchesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SearchResultTextMatchesItem::class,
        'default' => [],
    ])]
    public array $text_matches;

    /** @see $related */
    public const related = 'related';
    /** @var array<int, TopicSearchResultItemRelatedItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => TopicSearchResultItemRelatedItem::class,
        'default' => [],
    ])]
    public array $related;

    /** @see $aliases */
    public const aliases = 'aliases';
    /** @var array<int, TopicSearchResultItemAliasesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => TopicSearchResultItemAliasesItem::class,
        'default' => [],
    ])]
    public array $aliases;
}
