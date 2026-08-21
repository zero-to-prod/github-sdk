<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Commit
 * @link https://docs.github.com/
 */
class Commit
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

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

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
    public ?CommitCommit $commit = null;

    /** @see $author */
    public const author = 'author';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $author;

    /** @see $committer */
    public const committer = 'committer';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $committer;

    /** @see $parents */
    public const parents = 'parents';
    /** @var array<int, CommitParentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CommitParentsItem::class,
        'default' => [],
    ])]
    public array $parents;

    /** @see $stats */
    public const stats = 'stats';
    #[Describe(['nullable' => true])]
    public ?CommitStats $stats = null;

    /** @see $files */
    public const files = 'files';
    /** @var array<int, DiffEntry> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DiffEntry::class,
        'default' => [],
    ])]
    public array $files;
}
