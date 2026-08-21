<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCodespaceAccessRequest
{
    use DataModel;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => UpdateOrgCodespaceAccessRequestVisibility::unknown])]
    public UpdateOrgCodespaceAccessRequestVisibility $visibility;

    /** @see $selected_usernames */
    public const selected_usernames = 'selected_usernames';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $selected_usernames;
}
