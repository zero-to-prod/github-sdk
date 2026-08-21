<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Contributor Activity
 * @link https://docs.github.com/
 */
class ContributorActivity
{
    use DataModel;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $author = null;

    /** @see $total */
    public const total = 'total';
    #[Describe(['nullable' => true])]
    public ?int $total = null;

    /** @see $weeks */
    public const weeks = 'weeks';
    /** @var array<int, ContributorActivityWeeksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ContributorActivityWeeksItem::class,
        'default' => [],
    ])]
    public array $weeks;
}
