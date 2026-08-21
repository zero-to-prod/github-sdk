<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgArtifactMetadataDeploymentRecordClusterJobResponse
{
    use DataModel;

    /** @see $job_id */
    public const job_id = 'job_id';
    #[Describe(['nullable' => true])]
    public ?int $job_id = null;

    /** @see $errors */
    public const errors = 'errors';
    /** @var array<int, array<string, mixed>> */
    #[Describe(['default' => []])]
    public array $errors;
}
