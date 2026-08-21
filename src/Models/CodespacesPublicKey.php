<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The public key used for setting Codespaces secrets.
 * @link https://docs.github.com/
 */
class CodespacesPublicKey
{
    use DataModel;

    /** @see $key_id */
    public const key_id = 'key_id';
    #[Describe(['nullable' => true])]
    public ?string $key_id = null;

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
}
