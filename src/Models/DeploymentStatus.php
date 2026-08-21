<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The status of a deployment.
 * @link https://docs.github.com/
 */
class DeploymentStatus
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => DeploymentStatusState::unknown])]
    public DeploymentStatusState $state;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $target_url */
    public const target_url = 'target_url';
    #[Describe(['nullable' => true])]
    public ?string $target_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $deployment_url */
    public const deployment_url = 'deployment_url';
    #[Describe(['nullable' => true])]
    public ?string $deployment_url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $environment_url */
    public const environment_url = 'environment_url';
    #[Describe(['nullable' => true])]
    public ?string $environment_url = null;

    /** @see $log_url */
    public const log_url = 'log_url';
    #[Describe(['nullable' => true])]
    public ?string $log_url = null;

    /** @see $performed_via_github_app */
    public const performed_via_github_app = 'performed_via_github_app';
    #[Describe(['nullable' => true])]
    public ?Integration $performed_via_github_app = null;
}
