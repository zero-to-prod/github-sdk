<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Check immutable releases settings for an organization.
 * @link https://docs.github.com/
 */
class ImmutableReleasesOrganizationSettings
{
    use DataModel;

    /** @see $enforced_repositories */
    public const enforced_repositories = 'enforced_repositories';
    #[Describe(['default' => EnabledRepositories::unknown])]
    public EnabledRepositories $enforced_repositories;

    /** @see $selected_repositories_url */
    public const selected_repositories_url = 'selected_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_repositories_url = null;
}
