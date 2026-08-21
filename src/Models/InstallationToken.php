<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Authentication token for a GitHub App installed on a user or org.
 * @link https://docs.github.com/
 */
class InstallationToken
{
    use DataModel;

    /** @see $token */
    public const token = 'token';
    #[Describe(['nullable' => true])]
    public ?string $token = null;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?AppPermissions $permissions = null;

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['nullable' => true])]
    public ?InstallationRepositorySelection $repository_selection = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, Repository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => Repository::class,
        'default' => [],
    ])]
    public array $repositories;

    /** @see $single_file */
    public const single_file = 'single_file';
    #[Describe(['nullable' => true])]
    public ?string $single_file = null;

    /** @see $has_multiple_single_files */
    public const has_multiple_single_files = 'has_multiple_single_files';
    #[Describe(['nullable' => true])]
    public ?bool $has_multiple_single_files = null;

    /** @see $single_file_paths */
    public const single_file_paths = 'single_file_paths';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $single_file_paths;
}
