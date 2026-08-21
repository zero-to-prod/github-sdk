<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoBranchProtectionRestrictionUserRequest
{
    use DataModel;

    /** @see $users */
    public const users = 'users';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $users;
}
