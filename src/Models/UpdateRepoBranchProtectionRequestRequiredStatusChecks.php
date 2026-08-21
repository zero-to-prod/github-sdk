<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Require status checks to pass before merging. Set to `null` to disable.
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequestRequiredStatusChecks
{
    use DataModel;

    /** @see $strict */
    public const strict = 'strict';
    #[Describe(['nullable' => true])]
    public ?bool $strict = null;

    /** @see $contexts */
    public const contexts = 'contexts';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $contexts;

    /** @see $checks */
    public const checks = 'checks';
    /** @var array<int, UpdateRepoBranchProtectionRequestRequiredStatusChecksChecksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoBranchProtectionRequestRequiredStatusChecksChecksItem::class,
        'default' => [],
    ])]
    public array $checks;
}
