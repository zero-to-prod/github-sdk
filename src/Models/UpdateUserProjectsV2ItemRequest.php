<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateUserProjectsV2ItemRequest
{
    use DataModel;

    /** @see $fields */
    public const fields = 'fields';
    /** @var array<int, UpdateUserProjectsV2ItemRequestFieldsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateUserProjectsV2ItemRequestFieldsItem::class,
        'default' => [],
    ])]
    public array $fields;
}
