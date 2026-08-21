<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An autolink reference.
 * @link https://docs.github.com/
 */
class Autolink
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $key_prefix */
    public const key_prefix = 'key_prefix';
    #[Describe(['nullable' => true])]
    public ?string $key_prefix = null;

    /** @see $url_template */
    public const url_template = 'url_template';
    #[Describe(['nullable' => true])]
    public ?string $url_template = null;

    /** @see $is_alphanumeric */
    public const is_alphanumeric = 'is_alphanumeric';
    #[Describe(['nullable' => true])]
    public ?bool $is_alphanumeric = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;
}
