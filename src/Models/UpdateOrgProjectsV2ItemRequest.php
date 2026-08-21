<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateOrgProjectsV2ItemRequest
{
    use DataModel;

    /** @see $fields */
    public const fields = 'fields';
    /** @var array<int, UpdateOrgProjectsV2ItemRequestFieldsItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateOrgProjectsV2ItemRequestFieldsItem::class,
        'default' => [],
    ])]
    public array $fields;
}
