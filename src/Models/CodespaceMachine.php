<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A description of the machine powering a codespace.
 * @link https://docs.github.com/
 */
class CodespaceMachine
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $display_name */
    public const display_name = 'display_name';
    #[Describe(['nullable' => true])]
    public ?string $display_name = null;

    /** @see $operating_system */
    public const operating_system = 'operating_system';
    #[Describe(['nullable' => true])]
    public ?string $operating_system = null;

    /** @see $storage_in_bytes */
    public const storage_in_bytes = 'storage_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $storage_in_bytes = null;

    /** @see $memory_in_bytes */
    public const memory_in_bytes = 'memory_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $memory_in_bytes = null;

    /** @see $cpus */
    public const cpus = 'cpus';
    #[Describe(['nullable' => true])]
    public ?int $cpus = null;

    /** @see $prebuild_availability */
    public const prebuild_availability = 'prebuild_availability';
    #[Describe(['nullable' => true])]
    public ?NullableCodespaceMachinePrebuildAvailability $prebuild_availability = null;
}
