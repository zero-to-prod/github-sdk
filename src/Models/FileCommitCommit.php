<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class FileCommitCommit
{
    use DataModel;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?FileCommitCommitAuthor $author = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?FileCommitCommitCommitter $committer = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $tree */
    public const tree = 'tree';
    #[Describe(['nullable' => true])]
    public ?FileCommitCommitTree $tree = null;

    /** @see $parents */
    public const parents = 'parents';
    /** @var array<int, FileCommitCommitParentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => FileCommitCommitParentsItem::class,
        'default' => [],
    ])]
    public array $parents;

    /** @see $verification */
    public const verification = 'verification';
    #[Describe(['nullable' => true])]
    public ?FileCommitCommitVerification $verification = null;
}
