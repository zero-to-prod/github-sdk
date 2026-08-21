<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Specify which security and analysis features to enable or disable for the
 * repository. To use this parameter, you must have admin permissions for the
 * repository or be an owner or security manager for the organization that
 * owns the repository. For more information, see "[Managing security
 * managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 * For example, to enable GitHub Advanced Security, use this data in the body
 * of the `PATCH` request: `{ "security_and_analysis": {"advanced_security":
 * { "status": "enabled" } } }`. You can check which security and analysis
 * features are currently enabled by using a `GET /repos/{owner}/{repo}`
 * request.
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysis
{
    use DataModel;

    /** @see $advanced_security */
    public const advanced_security = 'advanced_security';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisAdvancedSecurity $advanced_security = null;

    /** @see $code_security */
    public const code_security = 'code_security';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisCodeSecurity $code_security = null;

    /** @see $secret_scanning */
    public const secret_scanning = 'secret_scanning';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanning $secret_scanning = null;

    /** @see $secret_scanning_push_protection */
    public const secret_scanning_push_protection = 'secret_scanning_push_protection';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningPushProtection $secret_scanning_push_protection = null;

    /** @see $secret_scanning_ai_detection */
    public const secret_scanning_ai_detection = 'secret_scanning_ai_detection';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningAiDetection $secret_scanning_ai_detection = null;

    /** @see $secret_scanning_non_provider_patterns */
    public const secret_scanning_non_provider_patterns = 'secret_scanning_non_provider_patterns';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningNonProviderPatterns $secret_scanning_non_provider_patterns = null;

    /** @see $secret_scanning_delegated_alert_dismissal */
    public const secret_scanning_delegated_alert_dismissal = 'secret_scanning_delegated_alert_dismissal';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedAlertDismissal $secret_scanning_delegated_alert_dismissal = null;

    /** @see $secret_scanning_delegated_bypass */
    public const secret_scanning_delegated_bypass = 'secret_scanning_delegated_bypass';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypass $secret_scanning_delegated_bypass = null;

    /** @see $secret_scanning_delegated_bypass_options */
    public const secret_scanning_delegated_bypass_options = 'secret_scanning_delegated_bypass_options';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypassOptions $secret_scanning_delegated_bypass_options = null;
}
