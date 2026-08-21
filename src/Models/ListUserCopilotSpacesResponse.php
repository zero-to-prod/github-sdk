<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListUserCopilotSpacesResponse
{
    use DataModel;

    /** @see $spaces */
    public const spaces = 'spaces';
    /** @var array<int, CopilotSpace> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CopilotSpace::class,
        'default' => [],
    ])]
    public array $spaces;
}
