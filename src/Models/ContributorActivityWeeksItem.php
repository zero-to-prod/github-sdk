<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ContributorActivityWeeksItem
{
    use DataModel;

    /** @see $w */
    public const w = 'w';
    #[Describe(['nullable' => true])]
    public ?int $w = null;

    /** @see $a */
    public const a = 'a';
    #[Describe(['nullable' => true])]
    public ?int $a = null;

    /** @see $d */
    public const d = 'd';
    #[Describe(['nullable' => true])]
    public ?int $d = null;

    /** @see $c */
    public const c = 'c';
    #[Describe(['nullable' => true])]
    public ?int $c = null;
}
