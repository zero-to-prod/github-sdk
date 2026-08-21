<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A concurrency group with the workflow runs and jobs that are either
 * currently holding or waiting for the concurrency group lease.
 * @link https://docs.github.com/
 */
class ConcurrencyGroup
{
    use DataModel;

    /** @see $group_name */
    public const group_name = 'group_name';
    #[Describe(['nullable' => true])]
    public ?string $group_name = null;

    /** @see $group_url */
    public const group_url = 'group_url';
    #[Describe(['nullable' => true])]
    public ?string $group_url = null;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $group_members */
    public const group_members = 'group_members';
    /** @var array<int, ConcurrencyGroupGroupMembersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ConcurrencyGroupGroupMembersItem::class,
        'default' => [],
    ])]
    public array $group_members;
}
