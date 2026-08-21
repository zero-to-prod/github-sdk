<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListUserCodespaceMachinesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $machines */
    public const machines = 'machines';
    /** @var array<int, CodespaceMachine> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CodespaceMachine::class,
        'default' => [],
    ])]
    public array $machines;
}
