<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoEnvironmentDeploymentBranchPoliciesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $branch_policies */
    public const branch_policies = 'branch_policies';
    /** @var array<int, DeploymentBranchPolicy> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DeploymentBranchPolicy::class,
        'default' => [],
    ])]
    public array $branch_policies;
}
