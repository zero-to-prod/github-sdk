<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Use the `status` property to enable or disable GitHub Advanced Security
 * for this repository. For more information, see "[About GitHub Advanced
 * Security](/github/getting-started-with-github/learning-about-github/about-github-advanced-security)."
 * For standalone Code Scanning or Secret Protection products, this parameter
 * cannot be used.
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisAdvancedSecurity
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
