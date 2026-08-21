<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Branch protections protect branches
 * @link https://docs.github.com/
 */
class ProtectedBranch
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $required_status_checks */
    public const required_status_checks = 'required_status_checks';
    #[Describe(['nullable' => true])]
    public ?StatusCheckPolicy $required_status_checks = null;

    /** @see $required_pull_request_reviews */
    public const required_pull_request_reviews = 'required_pull_request_reviews';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchRequiredPullRequestReviews $required_pull_request_reviews = null;

    /** @see $required_signatures */
    public const required_signatures = 'required_signatures';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchRequiredSignatures $required_signatures = null;

    /** @see $enforce_admins */
    public const enforce_admins = 'enforce_admins';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchEnforceAdmins $enforce_admins = null;

    /** @see $required_linear_history */
    public const required_linear_history = 'required_linear_history';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchRequiredLinearHistory $required_linear_history = null;

    /** @see $allow_force_pushes */
    public const allow_force_pushes = 'allow_force_pushes';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchAllowForcePushes $allow_force_pushes = null;

    /** @see $allow_deletions */
    public const allow_deletions = 'allow_deletions';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchAllowDeletions $allow_deletions = null;

    /** @see $restrictions */
    public const restrictions = 'restrictions';
    #[Describe(['nullable' => true])]
    public ?BranchRestrictionPolicy $restrictions = null;

    /** @see $required_conversation_resolution */
    public const required_conversation_resolution = 'required_conversation_resolution';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchRequiredConversationResolution $required_conversation_resolution = null;

    /** @see $block_creations */
    public const block_creations = 'block_creations';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchBlockCreations $block_creations = null;

    /** @see $lock_branch */
    public const lock_branch = 'lock_branch';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchLockBranch $lock_branch = null;

    /** @see $allow_fork_syncing */
    public const allow_fork_syncing = 'allow_fork_syncing';
    #[Describe(['nullable' => true])]
    public ?ProtectedBranchAllowForkSyncing $allow_fork_syncing = null;
}
