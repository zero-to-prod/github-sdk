<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ConcurrencyGroupRunListConcurrencyGroupsItem
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

    /** @see $group_members */
    public const group_members = 'group_members';
    /** @var array<int, ConcurrencyGroupRunListConcurrencyGroupsItemGroupMembersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ConcurrencyGroupRunListConcurrencyGroupsItemGroupMembersItem::class,
        'default' => [],
    ])]
    public array $group_members;
}
