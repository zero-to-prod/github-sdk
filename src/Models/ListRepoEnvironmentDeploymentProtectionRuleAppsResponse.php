<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoEnvironmentDeploymentProtectionRuleAppsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $available_custom_deployment_protection_rule_integrations */
    public const available_custom_deployment_protection_rule_integrations = 'available_custom_deployment_protection_rule_integrations';
    /** @var array<int, CustomDeploymentRuleApp> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CustomDeploymentRuleApp::class,
        'default' => [],
    ])]
    public array $available_custom_deployment_protection_rule_integrations;
}
