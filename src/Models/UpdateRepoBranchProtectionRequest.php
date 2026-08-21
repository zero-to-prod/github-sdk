<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoBranchProtectionRequest
{
    use DataModel;

    /** @see $required_status_checks */
    public const required_status_checks = 'required_status_checks';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoBranchProtectionRequestRequiredStatusChecks $required_status_checks = null;

    /** @see $enforce_admins */
    public const enforce_admins = 'enforce_admins';
    #[Describe(['nullable' => true])]
    public ?bool $enforce_admins = null;

    /** @see $required_pull_request_reviews */
    public const required_pull_request_reviews = 'required_pull_request_reviews';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoBranchProtectionRequestRequiredPullRequestReviews $required_pull_request_reviews = null;

    /** @see $restrictions */
    public const restrictions = 'restrictions';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoBranchProtectionRequestRestrictions $restrictions = null;

    /** @see $required_linear_history */
    public const required_linear_history = 'required_linear_history';
    #[Describe(['nullable' => true])]
    public ?bool $required_linear_history = null;

    /** @see $allow_force_pushes */
    public const allow_force_pushes = 'allow_force_pushes';
    #[Describe(['nullable' => true])]
    public ?bool $allow_force_pushes = null;

    /** @see $allow_deletions */
    public const allow_deletions = 'allow_deletions';
    #[Describe(['nullable' => true])]
    public ?bool $allow_deletions = null;

    /** @see $block_creations */
    public const block_creations = 'block_creations';
    #[Describe(['nullable' => true])]
    public ?bool $block_creations = null;

    /** @see $required_conversation_resolution */
    public const required_conversation_resolution = 'required_conversation_resolution';
    #[Describe(['nullable' => true])]
    public ?bool $required_conversation_resolution = null;

    /** @see $lock_branch */
    public const lock_branch = 'lock_branch';
    #[Describe(['nullable' => true])]
    public ?bool $lock_branch = null;

    /** @see $allow_fork_syncing */
    public const allow_fork_syncing = 'allow_fork_syncing';
    #[Describe(['nullable' => true])]
    public ?bool $allow_fork_syncing = null;
}
