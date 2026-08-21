<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgInstallations2Response
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $installations */
    public const installations = 'installations';
    /** @var array<int, Installation> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Installation::class,
        'default' => [],
    ])]
    public array $installations;
}
