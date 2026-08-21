<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoActionRunPendingDeploymentRequest
{
    use DataModel;

    /** @see $environment_ids */
    public const environment_ids = 'environment_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $environment_ids;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => ReviewCustomGatesStateRequiredState::unknown])]
    public ReviewCustomGatesStateRequiredState $state;

    /** @see $comment */
    public const comment = 'comment';
    #[Describe(['nullable' => true])]
    public ?string $comment = null;
}
