<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullCodespaceRequest
{
    use DataModel;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $geo */
    public const geo = 'geo';
    #[Describe(['nullable' => true])]
    public ?CreateRepoCodespaceRequestGeo $geo = null;

    /** @see $client_ip */
    public const client_ip = 'client_ip';
    #[Describe(['nullable' => true])]
    public ?string $client_ip = null;

    /** @see $machine */
    public const machine = 'machine';
    #[Describe(['nullable' => true])]
    public ?string $machine = null;

    /** @see $devcontainer_path */
    public const devcontainer_path = 'devcontainer_path';
    #[Describe(['nullable' => true])]
    public ?string $devcontainer_path = null;

    /** @see $multi_repo_permissions_opt_out */
    public const multi_repo_permissions_opt_out = 'multi_repo_permissions_opt_out';
    #[Describe(['nullable' => true])]
    public ?bool $multi_repo_permissions_opt_out = null;

    /** @see $working_directory */
    public const working_directory = 'working_directory';
    #[Describe(['nullable' => true])]
    public ?string $working_directory = null;

    /** @see $idle_timeout_minutes */
    public const idle_timeout_minutes = 'idle_timeout_minutes';
    #[Describe(['nullable' => true])]
    public ?int $idle_timeout_minutes = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $retention_period_minutes */
    public const retention_period_minutes = 'retention_period_minutes';
    #[Describe(['nullable' => true])]
    public ?int $retention_period_minutes = null;
}
