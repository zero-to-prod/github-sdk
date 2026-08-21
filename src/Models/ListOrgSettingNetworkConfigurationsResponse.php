<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgSettingNetworkConfigurationsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $network_configurations */
    public const network_configurations = 'network_configurations';
    /** @var array<int, NetworkConfiguration> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => NetworkConfiguration::class,
        'default' => [],
    ])]
    public array $network_configurations;
}
