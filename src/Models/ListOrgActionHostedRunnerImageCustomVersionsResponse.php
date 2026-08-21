<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionHostedRunnerImageCustomVersionsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $image_versions */
    public const image_versions = 'image_versions';
    /** @var array<int, ActionsHostedRunnerCustomImageVersion> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsHostedRunnerCustomImageVersion::class,
        'default' => [],
    ])]
    public array $image_versions;
}
