<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgArtifactMetadataStorageRecordResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $storage_records */
    public const storage_records = 'storage_records';
    /** @var array<int, CreateOrgArtifactMetadataStorageRecordResponseStorageRecordsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateOrgArtifactMetadataStorageRecordResponseStorageRecordsItem::class,
        'default' => [],
    ])]
    public array $storage_records;
}
