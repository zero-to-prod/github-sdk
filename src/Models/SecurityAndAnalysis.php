<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecurityAndAnalysis
{
    use DataModel;

    /** @see $advanced_security */
    public const advanced_security = 'advanced_security';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisAdvancedSecurity $advanced_security = null;

    /** @see $code_security */
    public const code_security = 'code_security';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisCodeSecurity $code_security = null;

    /** @see $dependabot_security_updates */
    public const dependabot_security_updates = 'dependabot_security_updates';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisDependabotSecurityUpdates $dependabot_security_updates = null;

    /** @see $secret_scanning */
    public const secret_scanning = 'secret_scanning';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanning $secret_scanning = null;

    /** @see $secret_scanning_push_protection */
    public const secret_scanning_push_protection = 'secret_scanning_push_protection';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningPushProtection $secret_scanning_push_protection = null;

    /** @see $secret_scanning_non_provider_patterns */
    public const secret_scanning_non_provider_patterns = 'secret_scanning_non_provider_patterns';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningNonProviderPatterns $secret_scanning_non_provider_patterns = null;

    /** @see $secret_scanning_ai_detection */
    public const secret_scanning_ai_detection = 'secret_scanning_ai_detection';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningAiDetection $secret_scanning_ai_detection = null;

    /** @see $secret_scanning_delegated_alert_dismissal */
    public const secret_scanning_delegated_alert_dismissal = 'secret_scanning_delegated_alert_dismissal';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningDelegatedAlertDismissal $secret_scanning_delegated_alert_dismissal = null;

    /** @see $secret_scanning_delegated_bypass */
    public const secret_scanning_delegated_bypass = 'secret_scanning_delegated_bypass';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningDelegatedBypass $secret_scanning_delegated_bypass = null;

    /** @see $secret_scanning_delegated_bypass_options */
    public const secret_scanning_delegated_bypass_options = 'secret_scanning_delegated_bypass_options';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisSecretScanningDelegatedBypassOptions $secret_scanning_delegated_bypass_options = null;
}
