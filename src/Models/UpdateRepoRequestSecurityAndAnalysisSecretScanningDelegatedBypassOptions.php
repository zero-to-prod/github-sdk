<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feature options for secret scanning delegated bypass. This object is only
 * honored when
 * `security_and_analysis.secret_scanning_delegated_bypass.status` is set to
 * `enabled`. You can send this object in the same request as
 * `secret_scanning_delegated_bypass`, or update just the options in a
 * separate request.
 * @link https://docs.github.com/
 */
class UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypassOptions
{
    use DataModel;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypassOptionsReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoRequestSecurityAndAnalysisSecretScanningDelegatedBypassOptionsReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
