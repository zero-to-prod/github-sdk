<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * File Commit
 * @link https://docs.github.com/
 */
class FileCommit
{
    use DataModel;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?FileCommitContent $content = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?FileCommitCommit $commit = null;
}
