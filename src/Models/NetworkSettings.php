<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A hosted compute network settings resource.
 * @link https://docs.github.com/
 */
class NetworkSettings
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $network_configuration_id */
    public const network_configuration_id = 'network_configuration_id';
    #[Describe(['nullable' => true])]
    public ?string $network_configuration_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $subnet_id */
    public const subnet_id = 'subnet_id';
    #[Describe(['nullable' => true])]
    public ?string $subnet_id = null;

    /** @see $region */
    public const region = 'region';
    #[Describe(['nullable' => true])]
    public ?string $region = null;
}
