<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Branch Short
 * @link https://docs.github.com/
 */
class BranchShort
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?BranchShortCommit $commit = null;

    /** @see $protected */
    public const protected = 'protected';
    #[Describe(['nullable' => true])]
    public ?bool $protected = null;
}
