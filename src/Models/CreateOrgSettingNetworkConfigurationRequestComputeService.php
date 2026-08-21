<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The hosted compute service to use for the network configuration.
 * @link https://docs.github.com/
 */
enum CreateOrgSettingNetworkConfigurationRequestComputeService: string
{
    case unknown = 'unknown';
    case none = 'none';
    case actions = 'actions';
}
