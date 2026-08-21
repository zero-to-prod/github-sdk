<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The current status of the job.
 * @link https://docs.github.com/
 */
enum GetOrgArtifactMetadataDeploymentRecordClusterJobResponseStatus: string
{
    case unknown = 'unknown';
    case pending = 'pending';
    case processing = 'processing';
    case completed = 'completed';
    case failed = 'failed';
}
