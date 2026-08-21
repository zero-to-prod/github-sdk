<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Artifact Metadata Deployment Record
 * @link https://docs.github.com/
 */
class ArtifactDeploymentRecord
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $digest */
    public const digest = 'digest';
    #[Describe(['nullable' => true])]
    public ?string $digest = null;

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

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $attestation_id */
    public const attestation_id = 'attestation_id';
    #[Describe(['nullable' => true])]
    public ?int $attestation_id = null;
}
