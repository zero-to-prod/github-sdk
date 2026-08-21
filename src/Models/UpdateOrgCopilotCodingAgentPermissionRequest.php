<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgCopilotCodingAgentPermissionRequest
{
    use DataModel;

    /** @see $enabled_repositories */
    public const enabled_repositories = 'enabled_repositories';
    #[Describe(['default' => SelfHostedRunnersSettingsEnabledRepositories::unknown])]
    public SelfHostedRunnersSettingsEnabledRepositories $enabled_repositories;
}
