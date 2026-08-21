<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgAgentVariableRequest
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

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => OrganizationActionsSecretVisibility::unknown])]
    public OrganizationActionsSecretVisibility $visibility;

    /** @see $selected_repository_ids */
    public const selected_repository_ids = 'selected_repository_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $selected_repository_ids;
}
