<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The hierarchy between files in a Git repository.
 * @link https://docs.github.com/
 */
class GitTree
{
    use DataModel;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $truncated */
    public const truncated = 'truncated';
    #[Describe(['nullable' => true])]
    public ?bool $truncated = null;

    /** @see $tree */
    public const tree = 'tree';
    /** @var array<int, GitTreeTreeItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GitTreeTreeItem::class,
        'default' => [],
    ])]
    public array $tree;
}
