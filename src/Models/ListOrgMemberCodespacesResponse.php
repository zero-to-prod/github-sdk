<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgMemberCodespacesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $codespaces */
    public const codespaces = 'codespaces';
    /** @var array<int, Codespace> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Codespace::class,
        'default' => [],
    ])]
    public array $codespaces;
}
