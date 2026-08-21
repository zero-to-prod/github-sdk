<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListInstallationRepositoriesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, ListInstallationRepositoriesResponseRepositoriesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ListInstallationRepositoriesResponseRepositoriesItem::class,
        'default' => [],
    ])]
    public array $repositories;

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['nullable' => true])]
    public ?string $repository_selection = null;
}
