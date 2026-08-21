<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Enable or disable Dependabot security updates for the repository.
 * @link https://docs.github.com/
 */
class SecurityAndAnalysisDependabotSecurityUpdates
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysisAdvancedSecurityStatus $status = null;
}
