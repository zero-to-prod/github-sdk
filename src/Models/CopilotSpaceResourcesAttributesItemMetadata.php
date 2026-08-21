<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Metadata specific to the resource type.
 * @link https://docs.github.com/
 */
class CopilotSpaceResourcesAttributesItemMetadata
{
    use DataModel;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $file_path */
    public const file_path = 'file_path';
    #[Describe(['nullable' => true])]
    public ?string $file_path = null;

    /** @see $text */
    public const text = 'text';
    #[Describe(['nullable' => true])]
    public ?string $text = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $copilot_chat_attachment_id */
    public const copilot_chat_attachment_id = 'copilot_chat_attachment_id';
    #[Describe(['nullable' => true])]
    public ?int $copilot_chat_attachment_id = null;

    /** @see $media_type */
    public const media_type = 'media_type';
    #[Describe(['nullable' => true])]
    public ?string $media_type = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $height */
    public const height = 'height';
    #[Describe(['nullable' => true])]
    public ?int $height = null;

    /** @see $width */
    public const width = 'width';
    #[Describe(['nullable' => true])]
    public ?int $width = null;
}
