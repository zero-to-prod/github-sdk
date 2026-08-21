<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ConcurrencyGroupListConcurrencyGroupsItem
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

    /** @see $last_acquired_at */
    public const last_acquired_at = 'last_acquired_at';
    #[Describe(['nullable' => true])]
    public ?string $last_acquired_at = null;
}
