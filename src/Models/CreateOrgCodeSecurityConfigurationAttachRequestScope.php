<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The type of repositories to attach the configuration to. `selected` means
 * the configuration will be attached to only the repositories specified by
 * `selected_repository_ids`
 * @link https://docs.github.com/
 */
enum CreateOrgCodeSecurityConfigurationAttachRequestScope: string
{
    case unknown = 'unknown';
    case all = 'all';
    case all_without_configurations = 'all_without_configurations';
    case public = 'public';
    case private_or_internal = 'private_or_internal';
    case selected = 'selected';
}
