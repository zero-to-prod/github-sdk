<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The type of deployment branch policy for this environment. To allow all
 * branches to deploy, set to `null`.
 * @link https://docs.github.com/
 */
class DeploymentBranchPolicySettings
{
    use DataModel;

    /** @see $protected_branches */
    public const protected_branches = 'protected_branches';
    #[Describe(['nullable' => true])]
    public ?bool $protected_branches = null;

    /** @see $custom_branch_policies */
    public const custom_branch_policies = 'custom_branch_policies';
    #[Describe(['nullable' => true])]
    public ?bool $custom_branch_policies = null;
}
