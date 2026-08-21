<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Commit Comparison
 * @link https://docs.github.com/
 */
class CommitComparison
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

    /** @see $permalink_url */
    public const permalink_url = 'permalink_url';
    #[Describe(['nullable' => true])]
    public ?string $permalink_url = null;

    /** @see $diff_url */
    public const diff_url = 'diff_url';
    #[Describe(['nullable' => true])]
    public ?string $diff_url = null;

    /** @see $patch_url */
    public const patch_url = 'patch_url';
    #[Describe(['nullable' => true])]
    public ?string $patch_url = null;

    /** @see $base_commit */
    public const base_commit = 'base_commit';
    #[Describe(['nullable' => true])]
    public ?Commit $base_commit = null;

    /** @see $merge_base_commit */
    public const merge_base_commit = 'merge_base_commit';
    #[Describe(['nullable' => true])]
    public ?Commit $merge_base_commit = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => CommitComparisonStatus::unknown])]
    public CommitComparisonStatus $status;

    /** @see $ahead_by */
    public const ahead_by = 'ahead_by';
    #[Describe(['nullable' => true])]
    public ?int $ahead_by = null;

    /** @see $behind_by */
    public const behind_by = 'behind_by';
    #[Describe(['nullable' => true])]
    public ?int $behind_by = null;

    /** @see $total_commits */
    public const total_commits = 'total_commits';
    #[Describe(['nullable' => true])]
    public ?int $total_commits = null;

    /** @see $commits */
    public const commits = 'commits';
    /** @var array<int, Commit> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Commit::class,
        'default' => [],
    ])]
    public array $commits;

    /** @see $files */
    public const files = 'files';
    /** @var array<int, DiffEntry> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => DiffEntry::class,
        'default' => [],
    ])]
    public array $files;
}
