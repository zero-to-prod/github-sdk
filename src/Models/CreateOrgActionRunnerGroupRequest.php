<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgActionRunnerGroupRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?CreateOrgActionRunnerGroupRequestVisibility $visibility = null;

    /** @see $selected_repository_ids */
    public const selected_repository_ids = 'selected_repository_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $selected_repository_ids;

    /** @see $runners */
    public const runners = 'runners';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $runners;

    /** @see $allows_public_repositories */
    public const allows_public_repositories = 'allows_public_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $allows_public_repositories = null;

    /** @see $restricted_to_workflows */
    public const restricted_to_workflows = 'restricted_to_workflows';
    #[Describe(['nullable' => true])]
    public ?bool $restricted_to_workflows = null;

    /** @see $selected_workflows */
    public const selected_workflows = 'selected_workflows';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $selected_workflows;

    /** @see $network_configuration_id */
    public const network_configuration_id = 'network_configuration_id';
    #[Describe(['nullable' => true])]
    public ?string $network_configuration_id = null;
}
