<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of repositories to attach the configuration to.
 * @link https://docs.github.com/
 */
enum CreateEnterpriseCodeSecurityConfigurationAttachRequestScope: string
{
    case unknown = 'unknown';
    case all = 'all';
    case all_without_configurations = 'all_without_configurations';
}
