<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Use the `status` property to enable or disable secret scanning delegated
 * alert dismissal for this repository.
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedAlertDismissal
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
