<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgArtifactMetadataStorageRecordRequest
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

    /** @see $artifact_url */
    public const artifact_url = 'artifact_url';
    #[Describe(['nullable' => true])]
    public ?string $artifact_url = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $registry_url */
    public const registry_url = 'registry_url';
    #[Describe(['nullable' => true])]
    public ?string $registry_url = null;

    /** @see $repository */
    public const repository = 'repository';
    #[Describe(['nullable' => true])]
    public ?string $repository = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?CreateOrgArtifactMetadataStorageRecordRequestStatus $status = null;

    /** @see $github_repository */
    public const github_repository = 'github_repository';
    #[Describe(['nullable' => true])]
    public ?string $github_repository = null;

    /** @see $return_records */
    public const return_records = 'return_records';
    #[Describe(['nullable' => true])]
    public ?bool $return_records = null;
}
