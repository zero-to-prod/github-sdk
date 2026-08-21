<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoStargazerCountsResponse
{
    use DataModel;

    /** @see $count */
    public const count = 'count';
    #[Describe(['nullable' => true])]
    public ?int $count = null;
}
