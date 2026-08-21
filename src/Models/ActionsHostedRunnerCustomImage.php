<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Provides details of a custom runner image
 * @link https://docs.github.com/
 */
class ActionsHostedRunnerCustomImage
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $platform */
    public const platform = 'platform';
    #[Describe(['nullable' => true])]
    public ?string $platform = null;

    /** @see $total_versions_size */
    public const total_versions_size = 'total_versions_size';
    #[Describe(['nullable' => true])]
    public ?int $total_versions_size = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $source */
    public const source = 'source';
    #[Describe(['nullable' => true])]
    public ?string $source = null;

    /** @see $versions_count */
    public const versions_count = 'versions_count';
    #[Describe(['nullable' => true])]
    public ?int $versions_count = null;

    /** @see $latest_version */
    public const latest_version = 'latest_version';
    #[Describe(['nullable' => true])]
    public ?string $latest_version = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;
}
