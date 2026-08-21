<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgDependabotSecretsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $secrets */
    public const secrets = 'secrets';
    /** @var array<int, OrganizationDependabotSecret> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => OrganizationDependabotSecret::class,
        'default' => [],
    ])]
    public array $secrets;
}
