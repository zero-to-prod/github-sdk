<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of a particular machine spec.
 * @link https://docs.github.com/
 */
class ActionsHostedRunnerMachineSpec
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $cpu_cores */
    public const cpu_cores = 'cpu_cores';
    #[Describe(['nullable' => true])]
    public ?int $cpu_cores = null;

    /** @see $memory_gb */
    public const memory_gb = 'memory_gb';
    #[Describe(['nullable' => true])]
    public ?int $memory_gb = null;

    /** @see $storage_gb */
    public const storage_gb = 'storage_gb';
    #[Describe(['nullable' => true])]
    public ?int $storage_gb = null;
}
