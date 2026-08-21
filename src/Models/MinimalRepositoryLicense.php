<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class MinimalRepositoryLicense
{
    use DataModel;

    /** @see $key */
    public const key = 'key';
    #[Describe(['nullable' => true])]
    public ?string $key = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $spdx_id */
    public const spdx_id = 'spdx_id';
    #[Describe(['nullable' => true])]
    public ?string $spdx_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;
}
