<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListSearchIssuesResponse
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
    /** @var array<int, IssueSearchResultItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => IssueSearchResultItem::class,
        'default' => [],
    ])]
    public array $items;

    /** @see $search_type */
    public const search_type = 'search_type';
    #[Describe(['default' => ListSearchIssuesResponseSearchType::unknown])]
    public ListSearchIssuesResponseSearchType $search_type;

    /** @see $lexical_fallback_reason */
    public const lexical_fallback_reason = 'lexical_fallback_reason';
    /** @var array<int, ListSearchIssuesResponseLexicalFallbackReasonItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ListSearchIssuesResponseLexicalFallbackReasonItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $lexical_fallback_reason;
}
