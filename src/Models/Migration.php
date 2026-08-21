<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A migration.
 * @link https://docs.github.com/
 */
class Migration
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $guid */
    public const guid = 'guid';
    #[Describe(['nullable' => true])]
    public ?string $guid = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?string $state = null;

    /** @see $lock_repositories */
    public const lock_repositories = 'lock_repositories';
    #[Describe(['nullable' => true])]
    public ?bool $lock_repositories = null;

    /** @see $exclude_metadata */
    public const exclude_metadata = 'exclude_metadata';
    #[Describe(['nullable' => true])]
    public ?bool $exclude_metadata = null;

    /** @see $exclude_git_data */
    public const exclude_git_data = 'exclude_git_data';
    #[Describe(['nullable' => true])]
    public ?bool $exclude_git_data = null;

    /** @see $exclude_attachments */
    public const exclude_attachments = 'exclude_attachments';
    #[Describe(['nullable' => true])]
    public ?bool $exclude_attachments = null;

    /** @see $exclude_releases */
    public const exclude_releases = 'exclude_releases';
    #[Describe(['nullable' => true])]
    public ?bool $exclude_releases = null;

    /** @see $exclude_owner_projects */
    public const exclude_owner_projects = 'exclude_owner_projects';
    #[Describe(['nullable' => true])]
    public ?bool $exclude_owner_projects = null;

    /** @see $org_metadata_only */
    public const org_metadata_only = 'org_metadata_only';
    #[Describe(['nullable' => true])]
    public ?bool $org_metadata_only = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, Repository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Repository::class,
        'default' => [],
    ])]
    public array $repositories;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $archive_url */
    public const archive_url = 'archive_url';
    #[Describe(['nullable' => true])]
    public ?string $archive_url = null;

    /** @see $exclude */
    public const exclude = 'exclude';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $exclude;
}
