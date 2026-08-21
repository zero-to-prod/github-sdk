<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A Github-hosted hosted runner.
 * @link https://docs.github.com/
 */
class ActionsHostedRunner
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $runner_group_id */
    public const runner_group_id = 'runner_group_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_group_id = null;

    /** @see $image_details */
    public const image_details = 'image_details';
    #[Describe(['nullable' => true])]
    public ?NullableActionsHostedRunnerPoolImage $image_details = null;

    /** @see $machine_size_details */
    public const machine_size_details = 'machine_size_details';
    #[Describe(['nullable' => true])]
    public ?ActionsHostedRunnerMachineSpec $machine_size_details = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => ActionsHostedRunnerStatus::unknown])]
    public ActionsHostedRunnerStatus $status;

    /** @see $platform */
    public const platform = 'platform';
    #[Describe(['nullable' => true])]
    public ?string $platform = null;

    /** @see $maximum_runners */
    public const maximum_runners = 'maximum_runners';
    #[Describe(['nullable' => true])]
    public ?int $maximum_runners = null;

    /** @see $public_ip_enabled */
    public const public_ip_enabled = 'public_ip_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $public_ip_enabled = null;

    /** @see $public_ips */
    public const public_ips = 'public_ips';
    /** @var array<int, PublicIp> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => PublicIp::class,
        'default' => [],
    ])]
    public array $public_ips;

    /** @see $last_active_on */
    public const last_active_on = 'last_active_on';
    #[Describe(['nullable' => true])]
    public ?string $last_active_on = null;

    /** @see $image_gen */
    public const image_gen = 'image_gen';
    #[Describe(['nullable' => true])]
    public ?bool $image_gen = null;
}
