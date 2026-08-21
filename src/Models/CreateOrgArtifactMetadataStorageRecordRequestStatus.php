<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The status of the artifact (e.g., active, inactive).
 * @link https://docs.github.com/
 */
enum CreateOrgArtifactMetadataStorageRecordRequestStatus: string
{
    case unknown = 'unknown';
    case active = 'active';
    case eol = 'eol';
    case deleted = 'deleted';
}
