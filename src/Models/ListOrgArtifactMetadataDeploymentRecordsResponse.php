<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgArtifactMetadataDeploymentRecordsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $deployment_records */
    public const deployment_records = 'deployment_records';
    /** @var array<int, ArtifactDeploymentRecord> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ArtifactDeploymentRecord::class,
        'default' => [],
    ])]
    public array $deployment_records;
}
