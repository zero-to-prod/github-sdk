<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The permissions granted to the fine-grained access token.
 * @link https://docs.github.com/
 */
class AppPermissions
{
    use DataModel;

    /** @see $actions */
    public const actions = 'actions';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $actions = null;

    /** @see $administration */
    public const administration = 'administration';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $administration = null;

    /** @see $artifact_metadata */
    public const artifact_metadata = 'artifact_metadata';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $artifact_metadata = null;

    /** @see $attestations */
    public const attestations = 'attestations';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $attestations = null;

    /** @see $checks */
    public const checks = 'checks';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $checks = null;

    /** @see $code_quality */
    public const code_quality = 'code_quality';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $code_quality = null;

    /** @see $codespaces */
    public const codespaces = 'codespaces';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $codespaces = null;

    /** @see $contents */
    public const contents = 'contents';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $contents = null;

    /** @see $dependabot_secrets */
    public const dependabot_secrets = 'dependabot_secrets';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $dependabot_secrets = null;

    /** @see $deployments */
    public const deployments = 'deployments';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $deployments = null;

    /** @see $discussions */
    public const discussions = 'discussions';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $discussions = null;

    /** @see $environments */
    public const environments = 'environments';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $environments = null;

    /** @see $issues */
    public const issues = 'issues';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $issues = null;

    /** @see $merge_queues */
    public const merge_queues = 'merge_queues';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $merge_queues = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $metadata = null;

    /** @see $packages */
    public const packages = 'packages';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $packages = null;

    /** @see $pages */
    public const pages = 'pages';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $pages = null;

    /** @see $pull_requests */
    public const pull_requests = 'pull_requests';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $pull_requests = null;

    /** @see $repository_custom_properties */
    public const repository_custom_properties = 'repository_custom_properties';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $repository_custom_properties = null;

    /** @see $repository_hooks */
    public const repository_hooks = 'repository_hooks';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $repository_hooks = null;

    /** @see $repository_projects */
    public const repository_projects = 'repository_projects';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsRepositoryProjects $repository_projects = null;

    /** @see $secret_scanning_alerts */
    public const secret_scanning_alerts = 'secret_scanning_alerts';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $secret_scanning_alerts = null;

    /** @see $secrets */
    public const secrets = 'secrets';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $secrets = null;

    /** @see $security_events */
    public const security_events = 'security_events';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $security_events = null;

    /** @see $single_file */
    public const single_file = 'single_file';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $single_file = null;

    /** @see $statuses */
    public const statuses = 'statuses';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $statuses = null;

    /** @see $vulnerability_alerts */
    public const vulnerability_alerts = 'vulnerability_alerts';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $vulnerability_alerts = null;

    /** @see $workflows */
    public const workflows = 'workflows';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsWorkflows $workflows = null;

    /** @see $custom_properties_for_organizations */
    public const custom_properties_for_organizations = 'custom_properties_for_organizations';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $custom_properties_for_organizations = null;

    /** @see $members */
    public const members = 'members';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $members = null;

    /** @see $organization_administration */
    public const organization_administration = 'organization_administration';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_administration = null;

    /** @see $organization_custom_roles */
    public const organization_custom_roles = 'organization_custom_roles';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_custom_roles = null;

    /** @see $organization_custom_org_roles */
    public const organization_custom_org_roles = 'organization_custom_org_roles';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_custom_org_roles = null;

    /** @see $organization_custom_properties */
    public const organization_custom_properties = 'organization_custom_properties';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsRepositoryProjects $organization_custom_properties = null;

    /** @see $organization_copilot_seat_management */
    public const organization_copilot_seat_management = 'organization_copilot_seat_management';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_copilot_seat_management = null;

    /** @see $organization_copilot_agent_settings */
    public const organization_copilot_agent_settings = 'organization_copilot_agent_settings';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_copilot_agent_settings = null;

    /** @see $organization_announcement_banners */
    public const organization_announcement_banners = 'organization_announcement_banners';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_announcement_banners = null;

    /** @see $organization_events */
    public const organization_events = 'organization_events';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsOrganizationEvents $organization_events = null;

    /** @see $organization_hooks */
    public const organization_hooks = 'organization_hooks';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_hooks = null;

    /** @see $organization_personal_access_tokens */
    public const organization_personal_access_tokens = 'organization_personal_access_tokens';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_personal_access_tokens = null;

    /** @see $organization_personal_access_token_requests */
    public const organization_personal_access_token_requests = 'organization_personal_access_token_requests';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_personal_access_token_requests = null;

    /** @see $organization_plan */
    public const organization_plan = 'organization_plan';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsOrganizationEvents $organization_plan = null;

    /** @see $organization_projects */
    public const organization_projects = 'organization_projects';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsRepositoryProjects $organization_projects = null;

    /** @see $organization_packages */
    public const organization_packages = 'organization_packages';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_packages = null;

    /** @see $organization_secrets */
    public const organization_secrets = 'organization_secrets';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_secrets = null;

    /** @see $organization_self_hosted_runners */
    public const organization_self_hosted_runners = 'organization_self_hosted_runners';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_self_hosted_runners = null;

    /** @see $organization_user_blocking */
    public const organization_user_blocking = 'organization_user_blocking';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $organization_user_blocking = null;

    /** @see $email_addresses */
    public const email_addresses = 'email_addresses';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $email_addresses = null;

    /** @see $followers */
    public const followers = 'followers';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $followers = null;

    /** @see $git_ssh_keys */
    public const git_ssh_keys = 'git_ssh_keys';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $git_ssh_keys = null;

    /** @see $gpg_keys */
    public const gpg_keys = 'gpg_keys';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $gpg_keys = null;

    /** @see $interaction_limits */
    public const interaction_limits = 'interaction_limits';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $interaction_limits = null;

    /** @see $profile */
    public const profile = 'profile';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsWorkflows $profile = null;

    /** @see $starring */
    public const starring = 'starring';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsActions $starring = null;

    /** @see $enterprise_custom_properties_for_organizations */
    public const enterprise_custom_properties_for_organizations = 'enterprise_custom_properties_for_organizations';
    #[Describe(['nullable' => true])]
    public ?AppPermissionsRepositoryProjects $enterprise_custom_properties_for_organizations = null;
}
