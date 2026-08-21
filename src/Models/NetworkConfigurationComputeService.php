<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The hosted compute service the network configuration supports.
 * @link https://docs.github.com/
 */
enum NetworkConfigurationComputeService: string
{
    case unknown = 'unknown';
    case none = 'none';
    case actions = 'actions';
    case codespaces = 'codespaces';
}
