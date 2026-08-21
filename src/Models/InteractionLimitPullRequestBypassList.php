<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A list of user logins to add or remove from the pull request creation cap
 * bypass list.
 * @link https://docs.github.com/
 */
class InteractionLimitPullRequestBypassList
{
    use DataModel;

    /** @see $users */
    public const users = 'users';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $users;
}
