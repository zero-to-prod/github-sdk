<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A CodeQL database.
 * @link https://docs.github.com/
 */
class CodeScanningCodeqlDatabase
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $language */
    public const language = 'language';
    #[Describe(['nullable' => true])]
    public ?string $language = null;

    /** @see $uploader */
    public const uploader = 'uploader';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $uploader = null;

    /** @see $content_type */
    public const content_type = 'content_type';
    #[Describe(['nullable' => true])]
    public ?string $content_type = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $commit_oid */
    public const commit_oid = 'commit_oid';
    #[Describe(['nullable' => true])]
    public ?string $commit_oid = null;
}
