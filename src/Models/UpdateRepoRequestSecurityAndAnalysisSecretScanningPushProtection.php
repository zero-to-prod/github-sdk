<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Use the `status` property to enable or disable secret scanning push
 * protection for this repository. For more information, see "[Protecting
 * pushes with secret
 * scanning](/code-security/secret-scanning/protecting-pushes-with-secret-scanning)."
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanningPushProtection
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
