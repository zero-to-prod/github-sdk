<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class GistHistoryChangeStatus
{
    use DataModel;

    /** @see $total */
    public const total = 'total';
    #[Describe(['nullable' => true])]
    public ?int $total = null;

    /** @see $additions */
    public const additions = 'additions';
    #[Describe(['nullable' => true])]
    public ?int $additions = null;

    /** @see $deletions */
    public const deletions = 'deletions';
    #[Describe(['nullable' => true])]
    public ?int $deletions = null;
}
