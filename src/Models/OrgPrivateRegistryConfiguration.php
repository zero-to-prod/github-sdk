<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Private registry configuration for an organization
 * @link https://docs.github.com/
 */
class OrgPrivateRegistryConfiguration
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $registry_type */
    public const registry_type = 'registry_type';
    #[Describe(['default' => OrgPrivateRegistryConfigurationRegistryType::unknown])]
    public OrgPrivateRegistryConfigurationRegistryType $registry_type;

    /** @see $auth_type */
    public const auth_type = 'auth_type';
    #[Describe(['nullable' => true])]
    public ?OrgPrivateRegistryConfigurationAuthType $auth_type = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $username */
    public const username = 'username';
    #[Describe(['nullable' => true])]
    public ?string $username = null;

    /** @see $replaces_base */
    public const replaces_base = 'replaces_base';
    #[Describe(['nullable' => true])]
    public ?bool $replaces_base = null;

    /** @see $visibility */
    public const visibility = 'visibility';
    #[Describe(['default' => OrganizationActionsSecretVisibility::unknown])]
    public OrganizationActionsSecretVisibility $visibility;

    /** @see $tenant_id */
    public const tenant_id = 'tenant_id';
    #[Describe(['nullable' => true])]
    public ?string $tenant_id = null;

    /** @see $client_id */
    public const client_id = 'client_id';
    #[Describe(['nullable' => true])]
    public ?string $client_id = null;

    /** @see $aws_region */
    public const aws_region = 'aws_region';
    #[Describe(['nullable' => true])]
    public ?string $aws_region = null;

    /** @see $account_id */
    public const account_id = 'account_id';
    #[Describe(['nullable' => true])]
    public ?string $account_id = null;

    /** @see $role_name */
    public const role_name = 'role_name';
    #[Describe(['nullable' => true])]
    public ?string $role_name = null;

    /** @see $domain */
    public const domain = 'domain';
    #[Describe(['nullable' => true])]
    public ?string $domain = null;

    /** @see $domain_owner */
    public const domain_owner = 'domain_owner';
    #[Describe(['nullable' => true])]
    public ?string $domain_owner = null;

    /** @see $jfrog_oidc_provider_name */
    public const jfrog_oidc_provider_name = 'jfrog_oidc_provider_name';
    #[Describe(['nullable' => true])]
    public ?string $jfrog_oidc_provider_name = null;

    /** @see $audience */
    public const audience = 'audience';
    #[Describe(['nullable' => true])]
    public ?string $audience = null;

    /** @see $identity_mapping_name */
    public const identity_mapping_name = 'identity_mapping_name';
    #[Describe(['nullable' => true])]
    public ?string $identity_mapping_name = null;

    /** @see $namespace */
    public const namespace = 'namespace';
    #[Describe(['nullable' => true])]
    public ?string $namespace = null;

    /** @see $service_slug */
    public const service_slug = 'service_slug';
    #[Describe(['nullable' => true])]
    public ?string $service_slug = null;

    /** @see $api_host */
    public const api_host = 'api_host';
    #[Describe(['nullable' => true])]
    public ?string $api_host = null;

    /** @see $workload_identity_provider */
    public const workload_identity_provider = 'workload_identity_provider';
    #[Describe(['nullable' => true])]
    public ?string $workload_identity_provider = null;

    /** @see $service_account */
    public const service_account = 'service_account';
    #[Describe(['nullable' => true])]
    public ?string $service_account = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
