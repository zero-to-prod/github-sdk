<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoEnvironmentDeploymentProtectionRulesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $custom_deployment_protection_rules */
    public const custom_deployment_protection_rules = 'custom_deployment_protection_rules';
    /** @var array<int, DeploymentProtectionRule> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DeploymentProtectionRule::class,
        'default' => [],
    ])]
    public array $custom_deployment_protection_rules;
}
