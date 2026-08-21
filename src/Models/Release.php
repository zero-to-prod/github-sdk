<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A release.
 * @link https://docs.github.com/
 */
class Release
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $assets_url */
    public const assets_url = 'assets_url';
    #[Describe(['nullable' => true])]
    public ?string $assets_url = null;

    /** @see $upload_url */
    public const upload_url = 'upload_url';
    #[Describe(['nullable' => true])]
    public ?string $upload_url = null;

    /** @see $tarball_url */
    public const tarball_url = 'tarball_url';
    #[Describe(['nullable' => true])]
    public ?string $tarball_url = null;

    /** @see $zipball_url */
    public const zipball_url = 'zipball_url';
    #[Describe(['nullable' => true])]
    public ?string $zipball_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $tag_name */
    public const tag_name = 'tag_name';
    #[Describe(['nullable' => true])]
    public ?string $tag_name = null;

    /** @see $target_commitish */
    public const target_commitish = 'target_commitish';
    #[Describe(['nullable' => true])]
    public ?string $target_commitish = null;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $prerelease */
    public const prerelease = 'prerelease';
    #[Describe(['nullable' => true])]
    public ?bool $prerelease = null;

    /** @see $immutable */
    public const immutable = 'immutable';
    #[Describe(['nullable' => true])]
    public ?bool $immutable = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $published_at */
    public const published_at = 'published_at';
    #[Describe(['nullable' => true])]
    public ?string $published_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $author */
    public const author = 'author';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $author = null;

    /** @see $assets */
    public const assets = 'assets';
    /** @var array<int, ReleaseAsset> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ReleaseAsset::class,
        'default' => [],
    ])]
    public array $assets;

    /** @see $body_html */
    public const body_html = 'body_html';
    #[Describe(['nullable' => true])]
    public ?string $body_html = null;

    /** @see $body_text */
    public const body_text = 'body_text';
    #[Describe(['nullable' => true])]
    public ?string $body_text = null;

    /** @see $mentions_count */
    public const mentions_count = 'mentions_count';
    #[Describe(['nullable' => true])]
    public ?int $mentions_count = null;

    /** @see $discussion_url */
    public const discussion_url = 'discussion_url';
    #[Describe(['nullable' => true])]
    public ?string $discussion_url = null;

    /** @see $reactions */
    public const reactions = 'reactions';
    #[Describe(['nullable' => true])]
    public ?ReactionRollup $reactions = null;
}
