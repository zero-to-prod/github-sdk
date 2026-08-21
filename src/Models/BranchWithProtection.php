<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Branch With Protection
 * @link https://docs.github.com/
 */
class BranchWithProtection
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?Commit $commit = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?BranchWithProtectionLinks $links = null;

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

    /** @see $pattern */
    public const pattern = 'pattern';
    #[Describe(['nullable' => true])]
    public ?string $pattern = null;

    /** @see $required_approving_review_count */
    public const required_approving_review_count = 'required_approving_review_count';
    #[Describe(['nullable' => true])]
    public ?int $required_approving_review_count = null;
}
