<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgArtifactMetadataStorageRecordsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $storage_records */
    public const storage_records = 'storage_records';
    /** @var array<int, ListOrgArtifactMetadataStorageRecordsResponseStorageRecordsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ListOrgArtifactMetadataStorageRecordsResponseStorageRecordsItem::class,
        'default' => [],
    ])]
    public array $storage_records;
}
