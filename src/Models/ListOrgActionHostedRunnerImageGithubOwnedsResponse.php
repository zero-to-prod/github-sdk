<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgActionHostedRunnerImageGithubOwnedsResponse
{
    use DataModel;

    /** @see $total_count */
    public const total_count = 'total_count';
    #[Describe(['nullable' => true])]
    public ?int $total_count = null;

    /** @see $images */
    public const images = 'images';
    /** @var array<int, ActionsHostedRunnerCuratedImage> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ActionsHostedRunnerCuratedImage::class,
        'default' => [],
    ])]
    public array $images;
}
