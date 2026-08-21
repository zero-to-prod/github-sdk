<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgRequest
{
    use DataModel;

    /** @see $billing_email */
    public const billing_email = 'billing_email';
    #[Describe(['nullable' => true])]
    public ?string $billing_email = null;

    /** @see $company */
    public const company = 'company';
    #[Describe(['nullable' => true])]
    public ?string $company = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $twitter_username */
    public const twitter_username = 'twitter_username';
    #[Describe(['nullable' => true])]
    public ?string $twitter_username = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $has_organization_projects */
    public const has_organization_projects = 'has_organization_projects';
    #[Describe(['nullable' => true])]
    public ?bool $has_organization_projects = null;

    /** @see $has_repository_projects */
    public const has_repository_projects = 'has_repository_projects';
    #[Describe(['nullable' => true])]
    public ?bool $has_repository_projects = null;

    /** @see $default_repository_permission */
    public const default_repository_permission = 'default_repository_permission';
    #[Describe(['nullable' => true])]
    public ?UpdateOrgRequestDefaultRepositoryPermission $default_repository_permission = null;

    /** @see $members_can_create_repositories */
    public const members_can_create_repositories = 'members_can_create_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_repositories = null;

    /** @see $members_can_create_internal_repositories */
    public const members_can_create_internal_repositories = 'members_can_create_internal_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_internal_repositories = null;

    /** @see $members_can_create_private_repositories */
    public const members_can_create_private_repositories = 'members_can_create_private_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_private_repositories = null;

    /** @see $members_can_create_public_repositories */
    public const members_can_create_public_repositories = 'members_can_create_public_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $members_can_create_public_repositories = null;

    /** @see $members_allowed_repository_creation_type */
    public const members_allowed_repository_creation_type = 'members_allowed_repository_creation_type';
    #[Describe(['nullable' => true])]
    public ?UpdateOrgRequestMembersAllowedRepositoryCreationType $members_allowed_repository_creation_type = null;

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

    /** @see $blog */
    public const blog = 'blog';
    #[Describe(['nullable' => true])]
    public ?string $blog = null;

    /** @see $advanced_security_enabled_for_new_repositories */
    public const advanced_security_enabled_for_new_repositories = 'advanced_security_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $advanced_security_enabled_for_new_repositories = null;

    /** @see $dependabot_alerts_enabled_for_new_repositories */
    public const dependabot_alerts_enabled_for_new_repositories = 'dependabot_alerts_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $dependabot_alerts_enabled_for_new_repositories = null;

    /** @see $dependabot_security_updates_enabled_for_new_repositories */
    public const dependabot_security_updates_enabled_for_new_repositories = 'dependabot_security_updates_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $dependabot_security_updates_enabled_for_new_repositories = null;

    /** @see $dependency_graph_enabled_for_new_repositories */
    public const dependency_graph_enabled_for_new_repositories = 'dependency_graph_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $dependency_graph_enabled_for_new_repositories = null;

    /** @see $secret_scanning_enabled_for_new_repositories */
    public const secret_scanning_enabled_for_new_repositories = 'secret_scanning_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $secret_scanning_enabled_for_new_repositories = null;

    /** @see $secret_scanning_push_protection_enabled_for_new_repositories */
    public const secret_scanning_push_protection_enabled_for_new_repositories = 'secret_scanning_push_protection_enabled_for_new_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $secret_scanning_push_protection_enabled_for_new_repositories = null;

    /** @see $secret_scanning_push_protection_custom_link_enabled */
    public const secret_scanning_push_protection_custom_link_enabled = 'secret_scanning_push_protection_custom_link_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $secret_scanning_push_protection_custom_link_enabled = null;

    /** @see $secret_scanning_push_protection_custom_link */
    public const secret_scanning_push_protection_custom_link = 'secret_scanning_push_protection_custom_link';
    #[Describe(['nullable' => true])]
    public ?string $secret_scanning_push_protection_custom_link = null;

    /** @see $deploy_keys_enabled_for_repositories */
    public const deploy_keys_enabled_for_repositories = 'deploy_keys_enabled_for_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $deploy_keys_enabled_for_repositories = null;
}
