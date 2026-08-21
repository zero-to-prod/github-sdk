<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * An artifact
 * @link https://docs.github.com/
 */
class Artifact
{
    use DataModel;

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

    /** @see $size_in_bytes */
    public const size_in_bytes = 'size_in_bytes';
    #[Describe(['nullable' => true])]
    public ?int $size_in_bytes = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $archive_download_url */
    public const archive_download_url = 'archive_download_url';
    #[Describe(['nullable' => true])]
    public ?string $archive_download_url = null;

    /** @see $expired */
    public const expired = 'expired';
    #[Describe(['nullable' => true])]
    public ?bool $expired = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $digest */
    public const digest = 'digest';
    #[Describe(['nullable' => true])]
    public ?string $digest = null;

    /** @see $workflow_run */
    public const workflow_run = 'workflow_run';
    #[Describe(['nullable' => true])]
    public ?ArtifactWorkflowRun $workflow_run = null;
}
