<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Tag
 * @link https://docs.github.com/
 */
class Tag
{
    use DataModel;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $commit */
    public const commit = 'commit';
    #[Describe(['nullable' => true])]
    public ?TagCommit $commit = null;

    /** @see $zipball_url */
    public const zipball_url = 'zipball_url';
    #[Describe(['nullable' => true])]
    public ?string $zipball_url = null;

    /** @see $tarball_url */
    public const tarball_url = 'tarball_url';
    #[Describe(['nullable' => true])]
    public ?string $tarball_url = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;
}
