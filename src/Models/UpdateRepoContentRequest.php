<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoContentRequest
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $branch */
    public const branch = 'branch';
    #[Describe(['nullable' => true])]
    public ?string $branch = null;

    /** @see $committer */
    public const committer = 'committer';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoContentRequestCommitter $committer = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoContentRequestAuthor $author = null;
}
