<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class RunnerGroupsOrg
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?float $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?string $visibility = null;

    /** @see $default */
    public const default = 'default';
    #[Describe(['nullable' => true])]
    public ?bool $default = null;

    /** @see $selected_repositories_url */
    public const selected_repositories_url = 'selected_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $selected_repositories_url = null;

    /** @see $runners_url */
    public const runners_url = 'runners_url';
    #[Describe(['nullable' => true])]
    public ?string $runners_url = null;

    /** @see $hosted_runners_url */
    public const hosted_runners_url = 'hosted_runners_url';
    #[Describe(['nullable' => true])]
    public ?string $hosted_runners_url = null;

    /** @see $network_configuration_id */
    public const network_configuration_id = 'network_configuration_id';
    #[Describe(['nullable' => true])]
    public ?string $network_configuration_id = null;

    /** @see $inherited */
    public const inherited = 'inherited';
    #[Describe(['nullable' => true])]
    public ?bool $inherited = null;

    /** @see $inherited_allows_public_repositories */
    public const inherited_allows_public_repositories = 'inherited_allows_public_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $inherited_allows_public_repositories = null;

    /** @see $allows_public_repositories */
    public const allows_public_repositories = 'allows_public_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $allows_public_repositories = null;

    /** @see $workflow_restrictions_read_only */
    public const workflow_restrictions_read_only = 'workflow_restrictions_read_only';
    #[Describe(['nullable' => true])]
    public ?bool $workflow_restrictions_read_only = null;

    /** @see $restricted_to_workflows */
    public const restricted_to_workflows = 'restricted_to_workflows';
    #[Describe(['nullable' => true])]
    public ?bool $restricted_to_workflows = null;

    /** @see $selected_workflows */
    public const selected_workflows = 'selected_workflows';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $selected_workflows;
}
