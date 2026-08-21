<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgDependabotSecretRequest
{
    use DataModel;

    /** @see $encrypted_value */
    public const encrypted_value = 'encrypted_value';
    #[Describe(['nullable' => true])]
    public ?string $encrypted_value = null;

    /** @see $key_id */
    public const key_id = 'key_id';
    #[Describe(['nullable' => true])]
    public ?string $key_id = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => OrganizationActionsSecretVisibility::unknown])]
    public OrganizationActionsSecretVisibility $visibility;

    /** @see $selected_repository_ids */
    public const selected_repository_ids = 'selected_repository_ids';
    /** @var array<int, int|string> */
    #[Describe(['default' => []])]
    public array $selected_repository_ids;
}
