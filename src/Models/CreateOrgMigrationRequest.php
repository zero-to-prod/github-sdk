<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateOrgMigrationRequest
{
    use DataModel;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $repositories;

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

    /** @see $exclude */
    public const exclude = 'exclude';
    /** @var array<int, CreateOrgMigrationRequestExcludeItem|null> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CreateOrgMigrationRequestExcludeItem::class,
        'method' => 'tryFrom',
        'default' => [],
    ])]
    public array $exclude;
}
