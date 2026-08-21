<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateEnterpriseCopilotPolicyCodingAgentRequest
{
    use DataModel;

    /** @see $policy_state */
    public const policy_state = 'policy_state';
    #[Describe(['default' => UpdateEnterpriseCopilotPolicyCodingAgentRequestPolicyState::unknown])]
    public UpdateEnterpriseCopilotPolicyCodingAgentRequestPolicyState $policy_state;
}
