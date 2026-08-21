<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Organization variable for GitHub Actions.
 * @link https://docs.github.com/
 */
class OrganizationActionsVariable
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $value */
    public const value = 'value';
    #[Describe(['nullable' => true])]
    public ?string $value = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => OrganizationActionsSecretVisibility::unknown])]
    public OrganizationActionsSecretVisibility $visibility;

    /** @see $selected_repositories_url */
    public const selected_repositories_url = 'selected_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_repositories_url = null;
}
