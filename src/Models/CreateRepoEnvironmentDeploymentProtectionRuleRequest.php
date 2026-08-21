<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoEnvironmentDeploymentProtectionRuleRequest
{
    use DataModel;

    /** @see $integration_id */
    public const integration_id = 'integration_id';
    #[Describe(['nullable' => true])]
    public ?int $integration_id = null;
}
