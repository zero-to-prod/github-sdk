<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A GitHub Copilot Space represents an interactive AI workspace where users
 * can ask questions and get assistance.
 * @link https://docs.github.com/
 */
class CopilotSpace
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

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
    #[Describe(['default' => CopilotSpaceBaseRole::unknown])]
    public CopilotSpaceBaseRole $base_role;

    /** @see $owner */
    public const owner = 'owner';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $owner;

    /** @see $creator */
    public const creator = 'creator';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $creator = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $api_url */
    public const api_url = 'api_url';
    #[Describe(['nullable' => true])]
    public ?string $api_url = null;

    /** @see $resources_attributes */
    public const resources_attributes = 'resources_attributes';
    /** @var array<int, CopilotSpaceResourcesAttributesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CopilotSpaceResourcesAttributesItem::class,
        'default' => [],
    ])]
    public array $resources_attributes;
}
