<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgPrivateRegistriesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $configurations */
    public const configurations = 'configurations';
    /** @var array<int, OrgPrivateRegistryConfiguration> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrgPrivateRegistryConfiguration::class,
        'default' => [],
    ])]
    public array $configurations;
}
