<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A self hosted runner
 * @link https://docs.github.com/
 */
class Runner
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $runner_group_id */
    public const runner_group_id = 'runner_group_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_group_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $os */
    public const os = 'os';
    #[Describe(['nullable' => true])]
    public ?string $os = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $busy */
    public const busy = 'busy';
    #[Describe(['nullable' => true])]
    public ?bool $busy = null;

    /** @see $labels */
    public const labels = 'labels';
    /** @var array<int, RunnerLabel> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => RunnerLabel::class,
        'default' => [],
    ])]
    public array $labels;

    /** @see $ephemeral */
    public const ephemeral = 'ephemeral';
    #[Describe(['nullable' => true])]
    public ?bool $ephemeral = null;

    /** @see $version */
    public const version = 'version';
    #[Describe(['nullable' => true])]
    public ?string $version = null;
}
