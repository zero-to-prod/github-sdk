<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Commit Search Result Item
 * @link https://docs.github.com/
 */
class CommitSearchResultItem
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $comments_url */
    public const comments_url = 'comments_url';
    #[Describe(['nullable' => true])]
    public ?string $comments_url = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?CommitSearchResultItemCommit $commit = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $author = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?GitUser $committer = null;

    /** @see $parents */
    public const parents = 'parents';
    /** @var array<int, CommitSearchResultItemParentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CommitSearchResultItemParentsItem::class,
        'default' => [],
    ])]
    public array $parents;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $score */
    public const score = 'score';
    #[Describe(['nullable' => true])]
    public ?float $score = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

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
