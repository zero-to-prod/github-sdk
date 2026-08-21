<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ActionsOrganizationPermissions
{
    use DataModel;

    /** @see $enabled_repositories */
    public const enabled_repositories = 'enabled_repositories';
    #[Describe(['default' => EnabledRepositories::unknown])]
    public EnabledRepositories $enabled_repositories;

    /** @see $selected_repositories_url */
    public const selected_repositories_url = 'selected_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_repositories_url = null;

    /** @see $allowed_actions */
    public const allowed_actions = 'allowed_actions';
    #[Describe(['nullable' => true])]
    public ?AllowedActions $allowed_actions = null;

    /** @see $selected_actions_url */
    public const selected_actions_url = 'selected_actions_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_actions_url = null;

    /** @see $sha_pinning_required */
    public const sha_pinning_required = 'sha_pinning_required';
    #[Describe(['nullable' => true])]
    public ?bool $sha_pinning_required = null;
}
