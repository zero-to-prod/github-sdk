<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgArtifactMetadataDeploymentRecordClusterRequest
{
    use DataModel;

    /** @see $logical_environment */
    public const logical_environment = 'logical_environment';
    #[Describe(['nullable' => true])]
    public ?string $logical_environment = null;

    /** @see $physical_environment */
    public const physical_environment = 'physical_environment';
    #[Describe(['nullable' => true])]
    public ?string $physical_environment = null;

    /** @see $deployments */
    public const deployments = 'deployments';
    /** @var array<int, CreateOrgArtifactMetadataDeploymentRecordClusterRequestDeploymentsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateOrgArtifactMetadataDeploymentRecordClusterRequestDeploymentsItem::class,
        'default' => [],
    ])]
    public array $deployments;

    /** @see $partial_success */
    public const partial_success = 'partial_success';
    #[Describe(['nullable' => true])]
    public ?bool $partial_success = null;

    /** @see $return_records */
    public const return_records = 'return_records';
    #[Describe(['nullable' => true])]
    public ?bool $return_records = null;
}
