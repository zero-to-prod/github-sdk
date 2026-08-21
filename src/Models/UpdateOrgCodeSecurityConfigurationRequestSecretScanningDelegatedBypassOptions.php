<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feature options for secret scanning delegated bypass
 * @link https://docs.github.com/
 */
class UpdateOrgCodeSecurityConfigurationRequestSecretScanningDelegatedBypassOptions
{
    use DataModel;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, UpdateOrgCodeSecurityConfigurationRequestSecretScanningDelegatedBypassOptionsReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateOrgCodeSecurityConfigurationRequestSecretScanningDelegatedBypassOptionsReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
