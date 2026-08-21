<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Team Organization
 * @link https://docs.github.com/
 */
class TeamOrganization
{
    use DataModel;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $repos_url */
    public const repos_url = 'repos_url';
    #[Describe(['nullable' => true])]
    public ?string $repos_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

    /** @see $hooks_url */
    public const hooks_url = 'hooks_url';
    #[Describe(['nullable' => true])]
    public ?string $hooks_url = null;

    /** @see $issues_url */
    public const issues_url = 'issues_url';
    #[Describe(['nullable' => true])]
    public ?string $issues_url = null;

    /** @see $members_url */
    public const members_url = 'members_url';
    #[Describe(['nullable' => true])]
    public ?string $members_url = null;

    /** @see $public_members_url */
    public const public_members_url = 'public_members_url';
    #[Describe(['nullable' => true])]
    public ?string $public_members_url = null;

    /** @see $avatar_url */
    public const avatar_url = 'avatar_url';
    #[Describe(['nullable' => true])]
    public ?string $avatar_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $company */
    public const company = 'company';
    #[Describe(['nullable' => true])]
    public ?string $company = null;

    /** @see $blog */
    public const blog = 'blog';
    #[Describe(['nullable' => true])]
    public ?string $blog = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $twitter_username */
    public const twitter_username = 'twitter_username';
    #[Describe(['nullable' => true])]
    public ?string $twitter_username = null;

    /** @see $is_verified */
    public const is_verified = 'is_verified';
    #[Describe(['nullable' => true])]
    public ?bool $is_verified = null;

    /** @see $has_organization_projects */
    public const has_organization_projects = 'has_organization_projects';
    #[Describe(['nullable' => true])]
    public ?bool $has_organization_projects = null;

    /** @see $has_repository_projects */
    public const has_repository_projects = 'has_repository_projects';
    #[Describe(['nullable' => true])]
    public ?bool $has_repository_projects = null;

    /** @see $public_repos */
    public const public_repos = 'public_repos';
    #[Describe(['nullable' => true])]
    public ?int $public_repos = null;

    /** @see $public_gists */
    public const public_gists = 'public_gists';
    #[Describe(['nullable' => true])]
    public ?int $public_gists = null;

    /** @see $followers */
    public const followers = 'followers';
    #[Describe(['nullable' => true])]
    public ?int $followers = null;

    /** @see $following */
    public const following = 'following';
    #[Describe(['nullable' => true])]
    public ?int $following = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $total_private_repos */
    public const total_private_repos = 'total_private_repos';
    #[Describe(['nullable' => true])]
    public ?int $total_private_repos = null;

    /** @see $owned_private_repos */
    public const owned_private_repos = 'owned_private_repos';
    #[Describe(['nullable' => true])]
    public ?int $owned_private_repos = null;

    /** @see $private_gists */
    public const private_gists = 'private_gists';
    #[Describe(['nullable' => true])]
    public ?int $private_gists = null;

    /** @see $disk_usage */
    public const disk_usage = 'disk_usage';
    #[Describe(['nullable' => true])]
    public ?int $disk_usage = null;

    /** @see $collaborators */
    public const collaborators = 'collaborators';
    #[Describe(['nullable' => true])]
    public ?int $collaborators = null;

    /** @see $billing_email */
    public const billing_email = 'billing_email';
    #[Describe(['nullable' => true])]
    public ?string $billing_email = null;

    /** @see $plan */
    public const plan = 'plan';
    #[Describe(['nullable' => true])]
    public ?TeamOrganizationPlan $plan = null;

    /** @see $default_repository_permission */
    public const default_repository_permission = 'default_repository_permission';
    #[Describe(['nullable' => true])]
    public ?string $default_repository_permission = null;

    /** @see $members_can_create_repositories */
    public const members_can_create_repositories = 'members_can_create_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_repositories = null;

    /** @see $two_factor_requirement_enabled */
    public const two_factor_requirement_enabled = 'two_factor_requirement_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $two_factor_requirement_enabled = null;

    /** @see $members_allowed_repository_creation_type */
    public const members_allowed_repository_creation_type = 'members_allowed_repository_creation_type';
    #[Describe(['nullable' => true])]
    public ?string $members_allowed_repository_creation_type = null;

    /** @see $members_can_create_public_repositories */
    public const members_can_create_public_repositories = 'members_can_create_public_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_public_repositories = null;

    /** @see $members_can_create_private_repositories */
    public const members_can_create_private_repositories = 'members_can_create_private_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_private_repositories = null;

    /** @see $members_can_create_internal_repositories */
    public const members_can_create_internal_repositories = 'members_can_create_internal_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_internal_repositories = null;

    /** @see $members_can_create_pages */
    public const members_can_create_pages = 'members_can_create_pages';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_pages = null;

    /** @see $members_can_create_public_pages */
    public const members_can_create_public_pages = 'members_can_create_public_pages';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_public_pages = null;

    /** @see $members_can_create_private_pages */
    public const members_can_create_private_pages = 'members_can_create_private_pages';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_private_pages = null;

    /** @see $members_can_fork_private_repositories */
    public const members_can_fork_private_repositories = 'members_can_fork_private_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_fork_private_repositories = null;

    /** @see $web_commit_signoff_required */
    public const web_commit_signoff_required = 'web_commit_signoff_required';
    #[Describe(['nullable' => true])]
    public ?bool $web_commit_signoff_required = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $archived_at */
    public const archived_at = 'archived_at';
    #[Describe(['nullable' => true])]
    public ?string $archived_at = null;
}
