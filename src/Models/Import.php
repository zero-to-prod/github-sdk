<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * A repository import from an external source.
 * @link https://docs.github.com/
 */
class Import
{
    use DataModel;

    /** @see $vcs */
    public const vcs = 'vcs';
    #[Describe(['nullable' => true])]
    public ?string $vcs = null;

    /** @see $use_lfs */
    public const use_lfs = 'use_lfs';
    #[Describe(['nullable' => true])]
    public ?bool $use_lfs = null;

    /** @see $vcs_url */
    public const vcs_url = 'vcs_url';
    #[Describe(['nullable' => true])]
    public ?string $vcs_url = null;

    /** @see $svc_root */
    public const svc_root = 'svc_root';
    #[Describe(['nullable' => true])]
    public ?string $svc_root = null;

    /** @see $tfvc_project */
    public const tfvc_project = 'tfvc_project';
    #[Describe(['nullable' => true])]
    public ?string $tfvc_project = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => ImportStatus::unknown])]
    public ImportStatus $status;

    /** @see $status_text */
    public const status_text = 'status_text';
    #[Describe(['nullable' => true])]
    public ?string $status_text = null;

    /** @see $failed_step */
    public const failed_step = 'failed_step';
    #[Describe(['nullable' => true])]
    public ?string $failed_step = null;

    /** @see $error_message */
    public const error_message = 'error_message';
    #[Describe(['nullable' => true])]
    public ?string $error_message = null;

    /** @see $import_percent */
    public const import_percent = 'import_percent';
    #[Describe(['nullable' => true])]
    public ?int $import_percent = null;

    /** @see $commit_count */
    public const commit_count = 'commit_count';
    #[Describe(['nullable' => true])]
    public ?int $commit_count = null;

    /** @see $push_percent */
    public const push_percent = 'push_percent';
    #[Describe(['nullable' => true])]
    public ?int $push_percent = null;

    /** @see $has_large_files */
    public const has_large_files = 'has_large_files';
    #[Describe(['nullable' => true])]
    public ?bool $has_large_files = null;

    /** @see $large_files_size */
    public const large_files_size = 'large_files_size';
    #[Describe(['nullable' => true])]
    public ?int $large_files_size = null;

    /** @see $large_files_count */
    public const large_files_count = 'large_files_count';
    #[Describe(['nullable' => true])]
    public ?int $large_files_count = null;

    /** @see $project_choices */
    public const project_choices = 'project_choices';
    /** @var array<int, ImportProjectChoicesItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => ImportProjectChoicesItem::class,
        'default' => [],
    ])]
    public array $project_choices;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $authors_count */
    public const authors_count = 'authors_count';
    #[Describe(['nullable' => true])]
    public ?int $authors_count = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $authors_url */
    public const authors_url = 'authors_url';
    #[Describe(['nullable' => true])]
    public ?string $authors_url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $svn_root */
    public const svn_root = 'svn_root';
    #[Describe(['nullable' => true])]
    public ?string $svn_root = null;
}
