<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Protected Branch Pull Request Review
 * @link https://docs.github.com/
 */
class ProtectedBranchPullRequestReview
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $dismissal_restrictions */
    public const dismissal_restrictions = 'dismissal_restrictions';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchPullRequestReviewDismissalRestrictions $dismissal_restrictions = null;

    /** @see $bypass_pull_request_allowances */
    public const bypass_pull_request_allowances = 'bypass_pull_request_allowances';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchPullRequestReviewBypassPullRequestAllowances $bypass_pull_request_allowances = null;

    /** @see $dismiss_stale_reviews */
    public const dismiss_stale_reviews = 'dismiss_stale_reviews';
    #[Describe(['nullable' => true])]
    public ?bool $dismiss_stale_reviews = null;

    /** @see $require_code_owner_reviews */
    public const require_code_owner_reviews = 'require_code_owner_reviews';
    #[Describe(['nullable' => true])]
    public ?bool $require_code_owner_reviews = null;

    /** @see $required_approving_review_count */
    public const required_approving_review_count = 'required_approving_review_count';
    #[Describe(['nullable' => true])]
    public ?int $required_approving_review_count = null;

    /** @see $require_last_push_approval */
    public const require_last_push_approval = 'require_last_push_approval';
    #[Describe(['nullable' => true])]
    public ?bool $require_last_push_approval = null;
}
