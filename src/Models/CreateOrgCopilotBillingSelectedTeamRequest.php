<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgCopilotBillingSelectedTeamRequest
{
    use DataModel;

    /** @see $selected_teams */
    public const selected_teams = 'selected_teams';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $selected_teams;
}
