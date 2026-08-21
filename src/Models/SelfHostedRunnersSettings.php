<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SelfHostedRunnersSettings
{
    use DataModel;

    /** @see $enabled_repositories */
    public const enabled_repositories = 'enabled_repositories';
    #[Describe(['default' => SelfHostedRunnersSettingsEnabledRepositories::unknown])]
    public SelfHostedRunnersSettingsEnabledRepositories $enabled_repositories;

    /** @see $selected_repositories_url */
    public const selected_repositories_url = 'selected_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_repositories_url = null;
}
