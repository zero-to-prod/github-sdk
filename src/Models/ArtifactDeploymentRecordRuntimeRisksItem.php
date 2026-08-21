<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum ArtifactDeploymentRecordRuntimeRisksItem: string
{
    case unknown = 'unknown';
    case critical_resource = 'critical-resource';
    case internet_exposed = 'internet-exposed';
    case lateral_movement = 'lateral-movement';
    case sensitive_data = 'sensitive-data';
}
