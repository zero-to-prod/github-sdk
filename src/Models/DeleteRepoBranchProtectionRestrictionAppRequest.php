<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteRepoBranchProtectionRestrictionAppRequest
{
    use DataModel;

    /** @see $apps */
    public const apps = 'apps';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $apps;
}
