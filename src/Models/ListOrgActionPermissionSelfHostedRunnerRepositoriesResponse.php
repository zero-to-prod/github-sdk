<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionPermissionSelfHostedRunnerRepositoriesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, Repository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Repository::class,
        'default' => [],
    ])]
    public array $repositories;
}
