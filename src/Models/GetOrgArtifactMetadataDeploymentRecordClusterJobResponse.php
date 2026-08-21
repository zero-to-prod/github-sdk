<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GetOrgArtifactMetadataDeploymentRecordClusterJobResponse
{
    use DataModel;

    /** @see $job_id */
    public const job_id = 'job_id';
    #[Describe(['nullable' => true])]
    public ?int $job_id = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => GetOrgArtifactMetadataDeploymentRecordClusterJobResponseStatus::unknown])]
    public GetOrgArtifactMetadataDeploymentRecordClusterJobResponseStatus $status;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $errors */
    public const errors = 'errors';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $errors;
}
