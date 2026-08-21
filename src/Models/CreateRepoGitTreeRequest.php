<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoGitTreeRequest
{
    use DataModel;

    /** @see $tree */
    public const tree = 'tree';
    /** @var array<int, CreateRepoGitTreeRequestTreeItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateRepoGitTreeRequestTreeItem::class,
        'default' => [],
    ])]
    public array $tree;

    /** @see $base_tree */
    public const base_tree = 'base_tree';
    #[Describe(['nullable' => true])]
    public ?string $base_tree = null;
}
