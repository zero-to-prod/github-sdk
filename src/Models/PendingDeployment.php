<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Details of a deployment that is waiting for protection rules to pass
 * @link https://docs.github.com/
 */
class PendingDeployment
{
    use DataModel;

    /** @see $environment */
    public const environment = 'environment';
    #[Describe(['nullable' => true])]
    public ?PendingDeploymentEnvironment $environment = null;

    /** @see $wait_timer */
    public const wait_timer = 'wait_timer';
    #[Describe(['nullable' => true])]
    public ?int $wait_timer = null;

    /** @see $wait_timer_started_at */
    public const wait_timer_started_at = 'wait_timer_started_at';
    #[Describe(['nullable' => true])]
    public ?string $wait_timer_started_at = null;

    /** @see $current_user_can_approve */
    public const current_user_can_approve = 'current_user_can_approve';
    #[Describe(['nullable' => true])]
    public ?bool $current_user_can_approve = null;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, PendingDeploymentReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PendingDeploymentReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;
}
