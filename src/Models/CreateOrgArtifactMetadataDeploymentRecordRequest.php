<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgArtifactMetadataDeploymentRecordRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $digest */
    public const digest = 'digest';
    #[Describe(['nullable' => true])]
    public ?string $digest = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => CreateOrgArtifactMetadataDeploymentRecordRequestStatus::unknown])]
    public CreateOrgArtifactMetadataDeploymentRecordRequestStatus $status;

    /** @see $logical_environment */
    public const logical_environment = 'logical_environment';
    #[Describe(['nullable' => true])]
    public ?string $logical_environment = null;

    /** @see $physical_environment */
    public const physical_environment = 'physical_environment';
    #[Describe(['nullable' => true])]
    public ?string $physical_environment = null;

    /** @see $cluster */
    public const cluster = 'cluster';
    #[Describe(['nullable' => true])]
    public ?string $cluster = null;

    /** @see $deployment_name */
    public const deployment_name = 'deployment_name';
    #[Describe(['nullable' => true])]
    public ?string $deployment_name = null;

    /** @see $tags */
    public const tags = 'tags';
    /** @var array<string, string> */
    #[Describe(['default' => []])]
    public array $tags;

    /** @see $runtime_risks */
    public const runtime_risks = 'runtime_risks';
    /** @var array<int, ArtifactDeploymentRecordRuntimeRisksItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ArtifactDeploymentRecordRuntimeRisksItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $runtime_risks;

    /** @see $github_repository */
    public const github_repository = 'github_repository';
    #[Describe(['nullable' => true])]
    public ?string $github_repository = null;

    /** @see $return_records */
    public const return_records = 'return_records';
    #[Describe(['nullable' => true])]
    public ?bool $return_records = null;
}
