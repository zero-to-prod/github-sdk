<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $homepage */
    public const homepage = 'homepage';
    #[Describe(['nullable' => true])]
    public ?string $homepage = null;

    /** @see $private */
    public const private = 'private';
    #[Describe(['nullable' => true])]
    public ?bool $private = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?CreateOrgRepoRequestVisibility $visibility = null;

    /** @see $security_and_analysis */
    public const security_and_analysis = 'security_and_analysis';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoRequestSecurityAndAnalysis $security_and_analysis = null;

    /** @see $has_issues */
    public const has_issues = 'has_issues';
    #[Describe(['nullable' => true])]
    public ?bool $has_issues = null;

    /** @see $has_projects */
    public const has_projects = 'has_projects';
    #[Describe(['nullable' => true])]
    public ?bool $has_projects = null;

    /** @see $has_wiki */
    public const has_wiki = 'has_wiki';
    #[Describe(['nullable' => true])]
    public ?bool $has_wiki = null;

    /** @see $has_pull_requests */
    public const has_pull_requests = 'has_pull_requests';
    #[Describe(['nullable' => true])]
    public ?bool $has_pull_requests = null;

    /** @see $pull_request_creation_policy */
    public const pull_request_creation_policy = 'pull_request_creation_policy';
    #[Describe(['nullable' => true])]
    public ?RepositoryPullRequestCreationPolicy $pull_request_creation_policy = null;

    /** @see $is_template */
    public const is_template = 'is_template';
    #[Describe(['nullable' => true])]
    public ?bool $is_template = null;

    /** @see $default_branch */
    public const default_branch = 'default_branch';
    #[Describe(['nullable' => true])]
    public ?string $default_branch = null;

    /** @see $allow_squash_merge */
    public const allow_squash_merge = 'allow_squash_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_squash_merge = null;

    /** @see $allow_merge_commit */
    public const allow_merge_commit = 'allow_merge_commit';
    #[Describe(['nullable' => true])]
    public ?bool $allow_merge_commit = null;

    /** @see $allow_rebase_merge */
    public const allow_rebase_merge = 'allow_rebase_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_rebase_merge = null;

    /** @see $allow_auto_merge */
    public const allow_auto_merge = 'allow_auto_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_auto_merge = null;

    /** @see $delete_branch_on_merge */
    public const delete_branch_on_merge = 'delete_branch_on_merge';
    #[Describe(['nullable' => true])]
    public ?bool $delete_branch_on_merge = null;

    /** @see $allow_update_branch */
    public const allow_update_branch = 'allow_update_branch';
    #[Describe(['nullable' => true])]
    public ?bool $allow_update_branch = null;

    /** @see $use_squash_pr_title_as_default */
    public const use_squash_pr_title_as_default = 'use_squash_pr_title_as_default';
    #[Describe(['nullable' => true])]
    public ?bool $use_squash_pr_title_as_default = null;

    /** @see $squash_merge_commit_title */
    public const squash_merge_commit_title = 'squash_merge_commit_title';
    #[Describe(['nullable' => true])]
    public ?RepositorySquashMergeCommitTitle $squash_merge_commit_title = null;

    /** @see $squash_merge_commit_message */
    public const squash_merge_commit_message = 'squash_merge_commit_message';
    #[Describe(['nullable' => true])]
    public ?RepositorySquashMergeCommitMessage $squash_merge_commit_message = null;

    /** @see $merge_commit_title */
    public const merge_commit_title = 'merge_commit_title';
    #[Describe(['nullable' => true])]
    public ?RepositoryMergeCommitTitle $merge_commit_title = null;

    /** @see $merge_commit_message */
    public const merge_commit_message = 'merge_commit_message';
    #[Describe(['nullable' => true])]
    public ?RepositoryMergeCommitMessage $merge_commit_message = null;

    /** @see $archived */
    public const archived = 'archived';
    #[Describe(['nullable' => true])]
    public ?bool $archived = null;

    /** @see $allow_forking */
    public const allow_forking = 'allow_forking';
    #[Describe(['nullable' => true])]
    public ?bool $allow_forking = null;

    /** @see $web_commit_signoff_required */
    public const web_commit_signoff_required = 'web_commit_signoff_required';
    #[Describe(['nullable' => true])]
    public ?bool $web_commit_signoff_required = null;
}
