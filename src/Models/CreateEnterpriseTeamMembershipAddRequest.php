<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateEnterpriseTeamMembershipAddRequest
{
    use DataModel;

    /** @see $usernames */
    public const usernames = 'usernames';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $usernames;
}
