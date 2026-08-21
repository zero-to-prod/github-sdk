<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgPrivateRegistryPublicKeysResponse
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
}
