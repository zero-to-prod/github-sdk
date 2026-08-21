<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A code security configuration
 * @link https://docs.github.com/
 */
class CodeSecurityConfiguration
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $target_type */
    public const target_type = 'target_type';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationTargetType $target_type = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $advanced_security */
    public const advanced_security = 'advanced_security';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationAdvancedSecurity $advanced_security = null;

    /** @see $dependency_graph */
    public const dependency_graph = 'dependency_graph';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $dependency_graph = null;

    /** @see $dependency_graph_autosubmit_action */
    public const dependency_graph_autosubmit_action = 'dependency_graph_autosubmit_action';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $dependency_graph_autosubmit_action = null;

    /** @see $dependency_graph_autosubmit_action_options */
    public const dependency_graph_autosubmit_action_options = 'dependency_graph_autosubmit_action_options';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraphAutosubmitActionOptions $dependency_graph_autosubmit_action_options = null;

    /** @see $dependabot_alerts */
    public const dependabot_alerts = 'dependabot_alerts';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $dependabot_alerts = null;

    /** @see $dependabot_security_updates */
    public const dependabot_security_updates = 'dependabot_security_updates';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $dependabot_security_updates = null;

    /** @see $dependabot_delegated_alert_dismissal */
    public const dependabot_delegated_alert_dismissal = 'dependabot_delegated_alert_dismissal';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $dependabot_delegated_alert_dismissal = null;

    /** @see $code_scanning_options */
    public const code_scanning_options = 'code_scanning_options';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationCodeScanningOptions $code_scanning_options = null;

    /** @see $code_scanning_default_setup */
    public const code_scanning_default_setup = 'code_scanning_default_setup';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $code_scanning_default_setup = null;

    /** @see $code_scanning_default_setup_options */
    public const code_scanning_default_setup_options = 'code_scanning_default_setup_options';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationCodeScanningDefaultSetupOptions $code_scanning_default_setup_options = null;

    /** @see $code_scanning_delegated_alert_dismissal */
    public const code_scanning_delegated_alert_dismissal = 'code_scanning_delegated_alert_dismissal';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $code_scanning_delegated_alert_dismissal = null;

    /** @see $secret_scanning */
    public const secret_scanning = 'secret_scanning';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning = null;

    /** @see $secret_scanning_push_protection */
    public const secret_scanning_push_protection = 'secret_scanning_push_protection';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_push_protection = null;

    /** @see $secret_scanning_delegated_bypass */
    public const secret_scanning_delegated_bypass = 'secret_scanning_delegated_bypass';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_delegated_bypass = null;

    /** @see $secret_scanning_delegated_bypass_options */
    public const secret_scanning_delegated_bypass_options = 'secret_scanning_delegated_bypass_options';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationSecretScanningDelegatedBypassOptions $secret_scanning_delegated_bypass_options = null;

    /** @see $secret_scanning_validity_checks */
    public const secret_scanning_validity_checks = 'secret_scanning_validity_checks';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_validity_checks = null;

    /** @see $secret_scanning_non_provider_patterns */
    public const secret_scanning_non_provider_patterns = 'secret_scanning_non_provider_patterns';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_non_provider_patterns = null;

    /** @see $secret_scanning_generic_secrets */
    public const secret_scanning_generic_secrets = 'secret_scanning_generic_secrets';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_generic_secrets = null;

    /** @see $secret_scanning_delegated_alert_dismissal */
    public const secret_scanning_delegated_alert_dismissal = 'secret_scanning_delegated_alert_dismissal';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_delegated_alert_dismissal = null;

    /** @see $secret_scanning_extended_metadata */
    public const secret_scanning_extended_metadata = 'secret_scanning_extended_metadata';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $secret_scanning_extended_metadata = null;

    /** @see $private_vulnerability_reporting */
    public const private_vulnerability_reporting = 'private_vulnerability_reporting';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationDependencyGraph $private_vulnerability_reporting = null;

    /** @see $enforcement */
    public const enforcement = 'enforcement';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationEnforcement $enforcement = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
