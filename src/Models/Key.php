<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Key
 * @link https://docs.github.com/
 */
class Key
{
    use DataModel;

    /** @see $key */
    public const key = 'key';
    #[Describe(['nullable' => true])]
    public ?string $key = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $verified */
    public const verified = 'verified';
    #[Describe(['nullable' => true])]
    public ?bool $verified = null;

    /** @see $read_only */
    public const read_only = 'read_only';
    #[Describe(['nullable' => true])]
    public ?bool $read_only = null;

    /** @see $last_used */
    public const last_used = 'last_used';
    #[Describe(['nullable' => true])]
    public ?string $last_used = null;
}
