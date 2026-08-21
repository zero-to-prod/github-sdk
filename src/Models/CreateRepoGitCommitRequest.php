<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoGitCommitRequest
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $tree */
    public const tree = 'tree';
    #[Describe(['nullable' => true])]
    public ?string $tree = null;

    /** @see $parents */
    public const parents = 'parents';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $parents;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?CreateRepoGitCommitRequestAuthor $author = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?CreateRepoGitCommitRequestCommitter $committer = null;

    /** @see $signature */
    public const signature = 'signature';
    #[Describe(['nullable' => true])]
    public ?string $signature = null;
}
