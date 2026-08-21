<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feature options for secret scanning delegated bypass
 * @link https://docs.github.com/
 */
class CodeSecurityConfigurationSecretScanningDelegatedBypassOptions
{
    use DataModel;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodeSecurityConfigurationSecretScanningDelegatedBypassOptionsReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
