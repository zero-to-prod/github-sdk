<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A commit.
 * @link https://docs.github.com/
 */
class SimpleCommit
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $tree_id */
    public const tree_id = 'tree_id';
    #[Describe(['nullable' => true])]
    public ?string $tree_id = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $timestamp */
    public const timestamp = 'timestamp';
    #[Describe(['nullable' => true])]
    public ?string $timestamp = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?SimpleCommitAuthor $author = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?SimpleCommitCommitter $committer = null;
}
