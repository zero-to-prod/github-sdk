<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoGitTreeRequestTreeItem
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $mode */
    public const mode = 'mode';
    #[Describe(['nullable' => true])]
    public ?CreateRepoGitTreeRequestTreeItemMode $mode = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?CreateRepoGitTreeRequestTreeItemType $type = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $content */
    public const content = 'content';
    #[Describe(['nullable' => true])]
    public ?string $content = null;
}
