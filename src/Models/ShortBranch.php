<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Short Branch
 * @link https://docs.github.com/
 */
class ShortBranch
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?ShortBranchCommit $commit = null;

    /** @see $protected */
    public const protected = 'protected';
    #[Describe(['nullable' => true])]
    public ?bool $protected = null;

    /** @see $protection */
    public const protection = 'protection';
    #[Describe(['nullable' => true])]
    public ?BranchProtection $protection = null;

    /** @see $protection_url */
    public const protection_url = 'protection_url';
    #[Describe(['nullable' => true])]
    public ?string $protection_url = null;
}
