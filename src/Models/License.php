<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * License
 * @link https://docs.github.com/
 */
class License
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

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $implementation */
    public const implementation = 'implementation';
    #[Describe(['nullable' => true])]
    public ?string $implementation = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $permissions;

    /** @see $conditions */
    public const conditions = 'conditions';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $conditions;

    /** @see $limitations */
    public const limitations = 'limitations';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $limitations;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $featured */
    public const featured = 'featured';
    #[Describe(['nullable' => true])]
    public ?bool $featured = null;
}
