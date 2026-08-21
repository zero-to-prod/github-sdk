<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListUserCopilotSpaceResourcesResponse
{
    use DataModel;

    /** @see $resources */
    public const resources = 'resources';
    /** @var array<int, CopilotSpaceResource> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CopilotSpaceResource::class,
        'default' => [],
    ])]
    public array $resources;
}
