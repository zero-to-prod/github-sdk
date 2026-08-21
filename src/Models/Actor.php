<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Actor
 * @link https://docs.github.com/
 */
class Actor
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $display_login */
    public const display_login = 'display_login';
    #[Describe(['nullable' => true])]
    public ?string $display_login = null;

    /** @see $gravatar_id */
    public const gravatar_id = 'gravatar_id';
    #[Describe(['nullable' => true])]
    public ?string $gravatar_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $avatar_url */
    public const avatar_url = 'avatar_url';
    #[Describe(['nullable' => true])]
    public ?string $avatar_url = null;
}
