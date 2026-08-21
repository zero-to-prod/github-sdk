<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgSettingNetworkConfigurationRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $compute_service */
    public const compute_service = 'compute_service';
    #[Describe(['nullable' => true])]
    public ?CreateOrgSettingNetworkConfigurationRequestComputeService $compute_service = null;

    /** @see $network_settings_ids */
    public const network_settings_ids = 'network_settings_ids';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $network_settings_ids;

    /** @see $failover_network_settings_ids */
    public const failover_network_settings_ids = 'failover_network_settings_ids';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $failover_network_settings_ids;

    /** @see $failover_network_enabled */
    public const failover_network_enabled = 'failover_network_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $failover_network_enabled = null;
}
