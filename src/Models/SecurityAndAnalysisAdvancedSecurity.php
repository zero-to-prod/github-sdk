<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Enable or disable GitHub Advanced Security for the repository. For
 * standalone Code Scanning or Secret Protection products, this parameter
 * cannot be used.
 * @link https://docs.github.com/
 */
class SecurityAndAnalysisAdvancedSecurity
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisAdvancedSecurityStatus $status = null;
}
