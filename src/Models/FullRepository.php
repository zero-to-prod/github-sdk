<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Full Repository
 * @link https://docs.github.com/
 */
class FullRepository
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $full_name */
    public const full_name = 'full_name';
    #[Describe(['nullable' => true])]
    public ?string $full_name = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $private */
    public const private = 'private';
    #[Describe(['nullable' => true])]
    public ?bool $private = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $fork */
    public const fork = 'fork';
    #[Describe(['nullable' => true])]
    public ?bool $fork = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $archive_url */
    public const archive_url = 'archive_url';
    #[Describe(['nullable' => true])]
    public ?string $archive_url = null;

    /** @see $assignees_url */
    public const assignees_url = 'assignees_url';
    #[Describe(['nullable' => true])]
    public ?string $assignees_url = null;

    /** @see $blobs_url */
    public const blobs_url = 'blobs_url';
    #[Describe(['nullable' => true])]
    public ?string $blobs_url = null;

    /** @see $branches_url */
    public const branches_url = 'branches_url';
    #[Describe(['nullable' => true])]
    public ?string $branches_url = null;

    /** @see $collaborators_url */
    public const collaborators_url = 'collaborators_url';
    #[Describe(['nullable' => true])]
    public ?string $collaborators_url = null;

    /** @see $comments_url */
    public const comments_url = 'comments_url';
    #[Describe(['nullable' => true])]
    public ?string $comments_url = null;

    /** @see $commits_url */
    public const commits_url = 'commits_url';
    #[Describe(['nullable' => true])]
    public ?string $commits_url = null;

    /** @see $compare_url */
    public const compare_url = 'compare_url';
    #[Describe(['nullable' => true])]
    public ?string $compare_url = null;

    /** @see $contents_url */
    public const contents_url = 'contents_url';
    #[Describe(['nullable' => true])]
    public ?string $contents_url = null;

    /** @see $contributors_url */
    public const contributors_url = 'contributors_url';
    #[Describe(['nullable' => true])]
    public ?string $contributors_url = null;

    /** @see $deployments_url */
    public const deployments_url = 'deployments_url';
    #[Describe(['nullable' => true])]
    public ?string $deployments_url = null;

    /** @see $downloads_url */
    public const downloads_url = 'downloads_url';
    #[Describe(['nullable' => true])]
    public ?string $downloads_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

    /** @see $forks_url */
    public const forks_url = 'forks_url';
    #[Describe(['nullable' => true])]
    public ?string $forks_url = null;

    /** @see $git_commits_url */
    public const git_commits_url = 'git_commits_url';
    #[Describe(['nullable' => true])]
    public ?string $git_commits_url = null;

    /** @see $git_refs_url */
    public const git_refs_url = 'git_refs_url';
    #[Describe(['nullable' => true])]
    public ?string $git_refs_url = null;

    /** @see $git_tags_url */
    public const git_tags_url = 'git_tags_url';
    #[Describe(['nullable' => true])]
    public ?string $git_tags_url = null;

    /** @see $git_url */
    public const git_url = 'git_url';
    #[Describe(['nullable' => true])]
    public ?string $git_url = null;

    /** @see $issue_comment_url */
    public const issue_comment_url = 'issue_comment_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_comment_url = null;

    /** @see $issue_events_url */
    public const issue_events_url = 'issue_events_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_events_url = null;

    /** @see $issues_url */
    public const issues_url = 'issues_url';
    #[Describe(['nullable' => true])]
    public ?string $issues_url = null;

    /** @see $keys_url */
    public const keys_url = 'keys_url';
    #[Describe(['nullable' => true])]
    public ?string $keys_url = null;

    /** @see $labels_url */
    public const labels_url = 'labels_url';
    #[Describe(['nullable' => true])]
    public ?string $labels_url = null;

    /** @see $languages_url */
    public const languages_url = 'languages_url';
    #[Describe(['nullable' => true])]
    public ?string $languages_url = null;

    /** @see $merges_url */
    public const merges_url = 'merges_url';
    #[Describe(['nullable' => true])]
    public ?string $merges_url = null;

    /** @see $milestones_url */
    public const milestones_url = 'milestones_url';
    #[Describe(['nullable' => true])]
    public ?string $milestones_url = null;

    /** @see $notifications_url */
    public const notifications_url = 'notifications_url';
    #[Describe(['nullable' => true])]
    public ?string $notifications_url = null;

    /** @see $pulls_url */
    public const pulls_url = 'pulls_url';
    #[Describe(['nullable' => true])]
    public ?string $pulls_url = null;

    /** @see $releases_url */
    public const releases_url = 'releases_url';
    #[Describe(['nullable' => true])]
    public ?string $releases_url = null;

    /** @see $ssh_url */
    public const ssh_url = 'ssh_url';
    #[Describe(['nullable' => true])]
    public ?string $ssh_url = null;

    /** @see $stargazers_url */
    public const stargazers_url = 'stargazers_url';
    #[Describe(['nullable' => true])]
    public ?string $stargazers_url = null;

    /** @see $statuses_url */
    public const statuses_url = 'statuses_url';
    #[Describe(['nullable' => true])]
    public ?string $statuses_url = null;

    /** @see $subscribers_url */
    public const subscribers_url = 'subscribers_url';
    #[Describe(['nullable' => true])]
    public ?string $subscribers_url = null;

    /** @see $subscription_url */
    public const subscription_url = 'subscription_url';
    #[Describe(['nullable' => true])]
    public ?string $subscription_url = null;

    /** @see $tags_url */
    public const tags_url = 'tags_url';
    #[Describe(['nullable' => true])]
    public ?string $tags_url = null;

    /** @see $teams_url */
    public const teams_url = 'teams_url';
    #[Describe(['nullable' => true])]
    public ?string $teams_url = null;

    /** @see $trees_url */
    public const trees_url = 'trees_url';
    #[Describe(['nullable' => true])]
    public ?string $trees_url = null;

    /** @see $clone_url */
    public const clone_url = 'clone_url';
    #[Describe(['nullable' => true])]
    public ?string $clone_url = null;

    /** @see $mirror_url */
    public const mirror_url = 'mirror_url';
    #[Describe(['nullable' => true])]
    public ?string $mirror_url = null;

    /** @see $hooks_url */
    public const hooks_url = 'hooks_url';
    #[Describe(['nullable' => true])]
    public ?string $hooks_url = null;

    /** @see $svn_url */
    public const svn_url = 'svn_url';
    #[Describe(['nullable' => true])]
    public ?string $svn_url = null;

    /** @see $homepage */
    public const homepage = 'homepage';
    #[Describe(['nullable' => true])]
    public ?string $homepage = null;

    /** @see $language */
    public const language = 'language';
    #[Describe(['nullable' => true])]
    public ?string $language = null;

    /** @see $forks_count */
    public const forks_count = 'forks_count';
    #[Describe(['nullable' => true])]
    public ?int $forks_count = null;

    /** @see $stargazers_count */
    public const stargazers_count = 'stargazers_count';
    #[Describe(['nullable' => true])]
    public ?int $stargazers_count = null;

    /** @see $watchers_count */
    public const watchers_count = 'watchers_count';
    #[Describe(['nullable' => true])]
    public ?int $watchers_count = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $default_branch */
    public const default_branch = 'default_branch';
    #[Describe(['nullable' => true])]
    public ?string $default_branch = null;

    /** @see $open_issues_count */
    public const open_issues_count = 'open_issues_count';
    #[Describe(['nullable' => true])]
    public ?int $open_issues_count = null;

    /** @see $is_template */
    public const is_template = 'is_template';
    #[Describe(['nullable' => true])]
    public ?bool $is_template = null;

    /** @see $topics */
    public const topics = 'topics';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $topics;

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

    /** @see $has_pages */
    public const has_pages = 'has_pages';
    #[Describe(['nullable' => true])]
    public ?bool $has_pages = null;

    /** @see $has_downloads */
    public const has_downloads = 'has_downloads';
    #[Describe(['nullable' => true])]
    public ?bool $has_downloads = null;

    /** @see $has_discussions */
    public const has_discussions = 'has_discussions';
    #[Describe(['nullable' => true])]
    public ?bool $has_discussions = null;

    /** @see $has_pull_requests */
    public const has_pull_requests = 'has_pull_requests';
    #[Describe(['nullable' => true])]
    public ?bool $has_pull_requests = null;

    /** @see $pull_request_creation_policy */
    public const pull_request_creation_policy = 'pull_request_creation_policy';
    #[Describe(['nullable' => true])]
    public ?RepositoryPullRequestCreationPolicy $pull_request_creation_policy = null;

    /** @see $archived */
    public const archived = 'archived';
    #[Describe(['nullable' => true])]
    public ?bool $archived = null;

    /** @see $disabled */
    public const disabled = 'disabled';
    #[Describe(['nullable' => true])]
    public ?bool $disabled = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['nullable' => true])]
    public ?string $visibility = null;

    /** @see $pushed_at */
    public const pushed_at = 'pushed_at';
    #[Describe(['nullable' => true])]
    public ?string $pushed_at = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?FullRepositoryPermissions $permissions = null;

    /** @see $allow_rebase_merge */
    public const allow_rebase_merge = 'allow_rebase_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_rebase_merge = null;

    /** @see $template_repository */
    public const template_repository = 'template_repository';
    #[Describe(['nullable' => true])]
    public ?Repository $template_repository = null;

    /** @see $temp_clone_token */
    public const temp_clone_token = 'temp_clone_token';
    #[Describe(['nullable' => true])]
    public ?string $temp_clone_token = null;

    /** @see $allow_squash_merge */
    public const allow_squash_merge = 'allow_squash_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_squash_merge = null;

    /** @see $allow_auto_merge */
    public const allow_auto_merge = 'allow_auto_merge';
    #[Describe(['nullable' => true])]
    public ?bool $allow_auto_merge = null;

    /** @see $delete_branch_on_merge */
    public const delete_branch_on_merge = 'delete_branch_on_merge';
    #[Describe(['nullable' => true])]
    public ?bool $delete_branch_on_merge = null;

    /** @see $allow_merge_commit */
    public const allow_merge_commit = 'allow_merge_commit';
    #[Describe(['nullable' => true])]
    public ?bool $allow_merge_commit = null;

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

    /** @see $allow_forking */
    public const allow_forking = 'allow_forking';
    #[Describe(['nullable' => true])]
    public ?bool $allow_forking = null;

    /** @see $web_commit_signoff_required */
    public const web_commit_signoff_required = 'web_commit_signoff_required';
    #[Describe(['nullable' => true])]
    public ?bool $web_commit_signoff_required = null;

    /** @see $subscribers_count */
    public const subscribers_count = 'subscribers_count';
    #[Describe(['nullable' => true])]
    public ?int $subscribers_count = null;

    /** @see $network_count */
    public const network_count = 'network_count';
    #[Describe(['nullable' => true])]
    public ?int $network_count = null;

    /** @see $license */
    public const license = 'license';
    #[Describe(['nullable' => true])]
    public ?LicenseSimple $license = null;

    /** @see $organization */
    public const organization = 'organization';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $organization = null;

    /** @see $parent */
    public const parent = 'parent';
    #[Describe(['nullable' => true])]
    public ?Repository $parent = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?Repository $source = null;

    /** @see $forks */
    public const forks = 'forks';
    #[Describe(['nullable' => true])]
    public ?int $forks = null;

    /** @see $master_branch */
    public const master_branch = 'master_branch';
    #[Describe(['nullable' => true])]
    public ?string $master_branch = null;

    /** @see $open_issues */
    public const open_issues = 'open_issues';
    #[Describe(['nullable' => true])]
    public ?int $open_issues = null;

    /** @see $watchers */
    public const watchers = 'watchers';
    #[Describe(['nullable' => true])]
    public ?int $watchers = null;

    /** @see $anonymous_access_enabled */
    public const anonymous_access_enabled = 'anonymous_access_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $anonymous_access_enabled = null;

    /** @see $code_of_conduct */
    public const code_of_conduct = 'code_of_conduct';
    #[Describe(['nullable' => true])]
    public ?CodeOfConductSimple $code_of_conduct = null;

    /** @see $security_and_analysis */
    public const security_and_analysis = 'security_and_analysis';
    #[Describe(['nullable' => true])]
    public ?SecurityAndAnalysis $security_and_analysis = null;

    /** @see $custom_properties */
    public const custom_properties = 'custom_properties';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $custom_properties;
}
