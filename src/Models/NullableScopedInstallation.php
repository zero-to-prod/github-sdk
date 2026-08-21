<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class NullableScopedInstallation
{
    use DataModel;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?AppPermissions $permissions = null;

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['default' => InstallationRepositorySelection::unknown])]
    public InstallationRepositorySelection $repository_selection;

    /** @see $single_file_name */
    public const single_file_name = 'single_file_name';
    #[Describe(['nullable' => true])]
    public ?string $single_file_name = null;

    /** @see $has_multiple_single_files */
    public const has_multiple_single_files = 'has_multiple_single_files';
    #[Describe(['nullable' => true])]
    public ?bool $has_multiple_single_files = null;

    /** @see $single_file_paths */
    public const single_file_paths = 'single_file_paths';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $single_file_paths;

    /** @see $repositories_url */
    public const repositories_url = 'repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $repositories_url = null;

    /** @see $account */
    public const account = 'account';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $account = null;
}
