<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub repository.
 * @link https://docs.github.com/
 */
class SimpleRepository
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

    /** @see $hooks_url */
    public const hooks_url = 'hooks_url';
    #[Describe(['nullable' => true])]
    public ?string $hooks_url = null;
}
