<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoDeploymentStatusRequest
{
    use DataModel;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => CreateRepoDeploymentStatusRequestState::unknown])]
    public CreateRepoDeploymentStatusRequestState $state;

    /** @see $target_url */
    public const target_url = 'target_url';
    #[Describe(['nullable' => true])]
    public ?string $target_url = null;

    /** @see $log_url */
    public const log_url = 'log_url';
    #[Describe(['nullable' => true])]
    public ?string $log_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?string $environment = null;

    /** @see $environment_url */
    public const environment_url = 'environment_url';
    #[Describe(['nullable' => true])]
    public ?string $environment_url = null;

    /** @see $auto_inactive */
    public const auto_inactive = 'auto_inactive';
    #[Describe(['nullable' => true])]
    public ?bool $auto_inactive = null;
}
