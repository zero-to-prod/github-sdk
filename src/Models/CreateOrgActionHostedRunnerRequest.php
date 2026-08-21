<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgActionHostedRunnerRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $image */
    public const image = 'image';
    #[Describe(['nullable' => true])]
    public ?CreateOrgActionHostedRunnerRequestImage $image = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?string $size = null;

    /** @see $runner_group_id */
    public const runner_group_id = 'runner_group_id';
    #[Describe(['nullable' => true])]
    public ?int $runner_group_id = null;

    /** @see $maximum_runners */
    public const maximum_runners = 'maximum_runners';
    #[Describe(['nullable' => true])]
    public ?int $maximum_runners = null;

    /** @see $enable_static_ip */
    public const enable_static_ip = 'enable_static_ip';
    #[Describe(['nullable' => true])]
    public ?bool $enable_static_ip = null;

    /** @see $image_gen */
    public const image_gen = 'image_gen';
    #[Describe(['nullable' => true])]
    public ?bool $image_gen = null;
}
