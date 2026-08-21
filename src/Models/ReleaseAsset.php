<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Data related to a release.
 * @link https://docs.github.com/
 */
class ReleaseAsset
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $browser_download_url */
    public const browser_download_url = 'browser_download_url';
    #[Describe(['nullable' => true])]
    public ?string $browser_download_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $label */
    public const label = 'label';
    #[Describe(['nullable' => true])]
    public ?string $label = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => ReleaseAssetState::unknown])]
    public ReleaseAssetState $state;

    /** @see $content_type */
    public const content_type = 'content_type';
    #[Describe(['nullable' => true])]
    public ?string $content_type = null;

    /** @see $size */
    public const size = 'size';
    #[Describe(['nullable' => true])]
    public ?int $size = null;

    /** @see $digest */
    public const digest = 'digest';
    #[Describe(['nullable' => true])]
    public ?string $digest = null;

    /** @see $download_count */
    public const download_count = 'download_count';
    #[Describe(['nullable' => true])]
    public ?int $download_count = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $uploader */
    public const uploader = 'uploader';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $uploader = null;
}
