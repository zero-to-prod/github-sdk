<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BaseGistFilesValue
{
    use DataModel;

    /** @see $filename */
    public const filename = 'filename';
    #[Describe(['nullable' => true])]
    public ?string $filename = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $language */
    public const language = 'language';
    #[Describe(['nullable' => true])]
    public ?string $language = null;

    /** @see $raw_url */
    public const raw_url = 'raw_url';
    #[Describe(['nullable' => true])]
    public ?string $raw_url = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $encoding */
    public const encoding = 'encoding';
    #[Describe(['nullable' => true])]
    public ?string $encoding = null;
}
