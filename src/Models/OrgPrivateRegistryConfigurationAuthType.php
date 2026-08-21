<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The authentication type for the private registry.
 * @link https://docs.github.com/
 */
enum OrgPrivateRegistryConfigurationAuthType: string
{
    case unknown = 'unknown';
    case token = 'token';
    case username_password = 'username_password';
    case oidc_azure = 'oidc_azure';
    case oidc_aws = 'oidc_aws';
    case oidc_jfrog = 'oidc_jfrog';
    case oidc_cloudsmith = 'oidc_cloudsmith';
    case oidc_gcp = 'oidc_gcp';
}
