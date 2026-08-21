<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateUserSshSigningKeyRequest
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $key */
    public const key = 'key';
    #[Describe(['nullable' => true])]
    public ?string $key = null;
}
