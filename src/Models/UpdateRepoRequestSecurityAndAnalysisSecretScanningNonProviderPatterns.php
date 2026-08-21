<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Use the `status` property to enable or disable secret scanning
 * non-provider patterns for this repository. For more information, see
 * "[Supported secret scanning
 * patterns](/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)."
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanningNonProviderPatterns
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
