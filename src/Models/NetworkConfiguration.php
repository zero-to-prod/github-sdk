<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A hosted compute network configuration.
 * @link https://docs.github.com/
 */
class NetworkConfiguration
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $compute_service */
    public const compute_service = 'compute_service';
    #[Describe(['nullable' => true])]
    public ?NetworkConfigurationComputeService $compute_service = null;

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

    /** @see $created_on */
    public const created_on = 'created_on';
    #[Describe(['nullable' => true])]
    public ?string $created_on = null;
}
