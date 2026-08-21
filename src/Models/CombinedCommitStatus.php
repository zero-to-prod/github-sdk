<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Combined Commit Status
 * @link https://docs.github.com/
 */
class CombinedCommitStatus
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $statuses */
    public const statuses = 'statuses';
    /** @var array<int, SimpleCommitStatus> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleCommitStatus::class,
        'default' => [],
    ])]
    public array $statuses;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?MinimalRepository $repository = null;

    /** @see $commit_url */
    public const commit_url = 'commit_url';
    #[Describe(['nullable' => true])]
    public ?string $commit_url = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;
}
