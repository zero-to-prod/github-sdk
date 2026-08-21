<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgRepoRequest
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

    /** @see $has_downloads */
    public const has_downloads = 'has_downloads';
    #[Describe(['nullable' => true])]
    public ?bool $has_downloads = null;

    /** @see $is_template */
    public const is_template = 'is_template';
    #[Describe(['nullable' => true])]
    public ?bool $is_template = null;

    /** @see $team_id */
    public const team_id = 'team_id';
    #[Describe(['nullable' => true])]
    public ?int $team_id = null;

    /** @see $auto_init */
    public const auto_init = 'auto_init';
    #[Describe(['nullable' => true])]
    public ?bool $auto_init = null;

    /** @see $gitignore_template */
    public const gitignore_template = 'gitignore_template';
    #[Describe(['nullable' => true])]
    public ?string $gitignore_template = null;

    /** @see $license_template */
    public const license_template = 'license_template';
    #[Describe(['nullable' => true])]
    public ?string $license_template = null;

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

    /** @see $custom_properties */
    public const custom_properties = 'custom_properties';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $custom_properties;
}
