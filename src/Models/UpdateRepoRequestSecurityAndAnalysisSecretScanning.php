<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Use the `status` property to enable or disable secret scanning for this
 * repository. For more information, see "[About secret
 * scanning](/code-security/secret-security/about-secret-scanning)."
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanning
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
