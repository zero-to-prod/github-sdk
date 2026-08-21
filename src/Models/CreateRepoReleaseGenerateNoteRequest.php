<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoReleaseGenerateNoteRequest
{
    use DataModel;

    /** @see $tag_name */
    public const tag_name = 'tag_name';
    #[Describe(['nullable' => true])]
    public ?string $tag_name = null;

    /** @see $target_commitish */
    public const target_commitish = 'target_commitish';
    #[Describe(['nullable' => true])]
    public ?string $target_commitish = null;

    /** @see $previous_tag_name */
    public const previous_tag_name = 'previous_tag_name';
    #[Describe(['nullable' => true])]
    public ?string $previous_tag_name = null;

    /** @see $configuration_file_path */
    public const configuration_file_path = 'configuration_file_path';
    #[Describe(['nullable' => true])]
    public ?string $configuration_file_path = null;
}
