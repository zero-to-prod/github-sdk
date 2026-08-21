<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgCopilotBillingSelectedUserRequest
{
    use DataModel;

    /** @see $selected_usernames */
    public const selected_usernames = 'selected_usernames';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $selected_usernames;
}
