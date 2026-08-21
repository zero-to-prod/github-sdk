<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CommitCommit
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?GitUser $author = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?GitUser $committer = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $comment_count */
    public const comment_count = 'comment_count';
    #[Describe(['nullable' => true])]
    public ?int $comment_count = null;

    /** @see $tree */
    public const tree = 'tree';
    #[Describe(['nullable' => true])]
    public ?CommitCommitTree $tree = null;

    /** @see $verification */
    public const verification = 'verification';
    #[Describe(['nullable' => true])]
    public ?Verification $verification = null;
}
