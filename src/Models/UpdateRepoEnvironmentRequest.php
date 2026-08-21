<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoEnvironmentRequest
{
    use DataModel;

    /** @see $wait_timer */
    public const wait_timer = 'wait_timer';
    #[Describe(['nullable' => true])]
    public ?int $wait_timer = null;

    /** @see $prevent_self_review */
    public const prevent_self_review = 'prevent_self_review';
    #[Describe(['nullable' => true])]
    public ?bool $prevent_self_review = null;

    /** @see $reviewers */
    public const reviewers = 'reviewers';
    /** @var array<int, UpdateRepoEnvironmentRequestReviewersItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateRepoEnvironmentRequestReviewersItem::class,
        'default' => [],
    ])]
    public array $reviewers;

    /** @see $deployment_branch_policy */
    public const deployment_branch_policy = 'deployment_branch_policy';
    #[Describe(['nullable' => true])]
    public ?DeploymentBranchPolicySettings $deployment_branch_policy = null;
}
