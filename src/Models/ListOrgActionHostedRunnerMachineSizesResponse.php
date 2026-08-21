<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionHostedRunnerMachineSizesResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $machine_specs */
    public const machine_specs = 'machine_specs';
    /** @var array<int, ActionsHostedRunnerMachineSpec> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsHostedRunnerMachineSpec::class,
        'default' => [],
    ])]
    public array $machine_specs;
}
