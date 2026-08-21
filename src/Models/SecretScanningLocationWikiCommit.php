<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Represents a 'wiki_commit' secret scanning location type. This location
 * type shows that a secret was detected inside a commit to a repository
 * wiki.
 * @link https://docs.github.com/
 */
class SecretScanningLocationWikiCommit
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $start_line */
    public const start_line = 'start_line';
    #[Describe(['nullable' => true])]
    public ?float $start_line = null;

    /** @see $end_line */
    public const end_line = 'end_line';
    #[Describe(['nullable' => true])]
    public ?float $end_line = null;

    /** @see $start_column */
    public const start_column = 'start_column';
    #[Describe(['nullable' => true])]
    public ?float $start_column = null;

    /** @see $end_column */
    public const end_column = 'end_column';
    #[Describe(['nullable' => true])]
    public ?float $end_column = null;

    /** @see $blob_sha */
    public const blob_sha = 'blob_sha';
    #[Describe(['nullable' => true])]
    public ?string $blob_sha = null;

    /** @see $page_url */
    public const page_url = 'page_url';
    #[Describe(['nullable' => true])]
    public ?string $page_url = null;

    /** @see $commit_sha */
    public const commit_sha = 'commit_sha';
    #[Describe(['nullable' => true])]
    public ?string $commit_sha = null;

    /** @see $commit_url */
    public const commit_url = 'commit_url';
    #[Describe(['nullable' => true])]
    public ?string $commit_url = null;
}
