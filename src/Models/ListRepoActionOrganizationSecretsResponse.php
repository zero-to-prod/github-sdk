<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListRepoActionOrganizationSecretsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $secrets */
    public const secrets = 'secrets';
    /** @var array<int, ActionsSecret> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsSecret::class,
        'default' => [],
    ])]
    public array $secrets;
}
