<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The status of the artifact. Can be either deployed or decommissioned.
 * @link https://docs.github.com/
 */
enum CreateOrgArtifactMetadataDeploymentRecordRequestStatus: string
{
    case unknown = 'unknown';
    case deployed = 'deployed';
    case decommissioned = 'decommissioned';
}
