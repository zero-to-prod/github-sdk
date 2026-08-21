<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Commit Activity
 * @link https://docs.github.com/
 */
class CommitActivity
{
    use DataModel;

    /** @see $days */
    public const days = 'days';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $days;

    /** @see $total */
    public const total = 'total';
    #[Describe(['nullable' => true])]
    public ?int $total = null;

    /** @see $week */
    public const week = 'week';
    #[Describe(['nullable' => true])]
    public ?int $week = null;
}
