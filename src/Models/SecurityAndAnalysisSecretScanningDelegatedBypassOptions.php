<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class SecurityAndAnalysisSecretScanningDelegatedBypassOptions
{
    use DataModel;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, SecurityAndAnalysisSecretScanningDelegatedBypassOptionsReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SecurityAndAnalysisSecretScanningDelegatedBypassOptionsReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
