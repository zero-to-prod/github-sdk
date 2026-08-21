<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoActionRunArtifactsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $artifacts */
    public const artifacts = 'artifacts';
    /** @var array<int, Artifact> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Artifact::class,
        'default' => [],
    ])]
    public array $artifacts;
}
