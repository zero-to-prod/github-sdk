<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypassOptionsReviewersItem
{
    use DataModel;

    /** @see $reviewer_id */
    public const reviewer_id = 'reviewer_id';
    #[Describe(['nullable' => true])]
    public ?int $reviewer_id = null;

    /** @see $reviewer_type */
    public const reviewer_type = 'reviewer_type';
    #[Describe(['default' => CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItemReviewerType::unknown])]
    public CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItemReviewerType $reviewer_type;

    /** @see $mode */
    public const mode = 'mode';
    #[Describe(['nullable' => true])]
    public ?CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItemMode $mode = null;
}
