<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequestRequiredStatusChecksChecksItem
{
    use DataModel;

    /** @see $context */
    public const context = 'context';
    #[Describe(['nullable' => true])]
    public ?string $context = null;

    /** @see $app_id */
    public const app_id = 'app_id';
    #[Describe(['nullable' => true])]
    public ?int $app_id = null;
}
