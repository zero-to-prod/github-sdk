<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateUserCopilotSpaceRequest
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $general_instructions */
    public const general_instructions = 'general_instructions';
    #[Describe(['nullable' => true])]
    public ?string $general_instructions = null;

    /** @see $base_role */
    public const base_role = 'base_role';
    #[Describe(['nullable' => true])]
    public ?CreateUserCopilotSpaceRequestBaseRole $base_role = null;

    /** @see $resources_attributes */
    public const resources_attributes = 'resources_attributes';
    /** @var array<int, UpdateUserCopilotSpaceRequestResourcesAttributesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => UpdateUserCopilotSpaceRequestResourcesAttributesItem::class,
        'default' => [],
    ])]
    public array $resources_attributes;
}
