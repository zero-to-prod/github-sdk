<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgActionHostedRunnerRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

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

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?string $size = null;

    /** @see $image_source */
    public const image_source = 'image_source';
    #[Describe(['nullable' => true])]
    public ?NullableActionsHostedRunnerPoolImageSource $image_source = null;

    /** @see $image_id */
    public const image_id = 'image_id';
    #[Describe(['nullable' => true])]
    public ?string $image_id = null;

    /** @see $image_version */
    public const image_version = 'image_version';
    #[Describe(['nullable' => true])]
    public ?string $image_version = null;

    /** @see $image_gen */
    public const image_gen = 'image_gen';
    #[Describe(['nullable' => true])]
    public ?bool $image_gen = null;
}
