<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A resource attached to a Copilot Space.
 * @link https://docs.github.com/
 */
class CopilotSpaceResource
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $resource_type */
    public const resource_type = 'resource_type';
    #[Describe(['default' => CopilotSpaceResourcesAttributesItemResourceType::unknown])]
    public CopilotSpaceResourcesAttributesItemResourceType $resource_type;

    /** @see $copilot_chat_attachment_id */
    public const copilot_chat_attachment_id = 'copilot_chat_attachment_id';
    #[Describe(['nullable' => true])]
    public ?int $copilot_chat_attachment_id = null;

    /** @see $metadata */
    public const metadata = 'metadata';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $metadata;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
