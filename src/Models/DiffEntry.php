<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Diff Entry
 * @link https://docs.github.com/
 */
class DiffEntry
{
    use DataModel;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $filename */
    public const filename = 'filename';
    #[Describe(['nullable' => true])]
    public ?string $filename = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => DiffEntryStatus::unknown])]
    public DiffEntryStatus $status;

    /** @see $additions */
    public const additions = 'additions';
    #[Describe(['nullable' => true])]
    public ?int $additions = null;

    /** @see $deletions */
    public const deletions = 'deletions';
    #[Describe(['nullable' => true])]
    public ?int $deletions = null;

    /** @see $changes */
    public const changes = 'changes';
    #[Describe(['nullable' => true])]
    public ?int $changes = null;

    /** @see $blob_url */
    public const blob_url = 'blob_url';
    #[Describe(['nullable' => true])]
    public ?string $blob_url = null;

    /** @see $raw_url */
    public const raw_url = 'raw_url';
    #[Describe(['nullable' => true])]
    public ?string $raw_url = null;

    /** @see $contents_url */
    public const contents_url = 'contents_url';
    #[Describe(['nullable' => true])]
    public ?string $contents_url = null;

    /** @see $patch */
    public const patch = 'patch';
    #[Describe(['nullable' => true])]
    public ?string $patch = null;

    /** @see $previous_filename */
    public const previous_filename = 'previous_filename';
    #[Describe(['nullable' => true])]
    public ?string $previous_filename = null;
}
