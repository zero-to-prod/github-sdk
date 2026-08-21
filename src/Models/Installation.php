<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Installation
 * @link https://docs.github.com/
 */
class Installation
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $account */
    public const account = 'account';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $account;

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['default' => InstallationRepositorySelection::unknown])]
    public InstallationRepositorySelection $repository_selection;

    /** @see $access_tokens_url */
    public const access_tokens_url = 'access_tokens_url';
    #[Describe(['nullable' => true])]
    public ?string $access_tokens_url = null;

    /** @see $repositories_url */
    public const repositories_url = 'repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $repositories_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $app_id */
    public const app_id = 'app_id';
    #[Describe(['nullable' => true])]
    public ?int $app_id = null;

    /** @see $client_id */
    public const client_id = 'client_id';
    #[Describe(['nullable' => true])]
    public ?string $client_id = null;

    /** @see $target_id */
    public const target_id = 'target_id';
    #[Describe(['nullable' => true])]
    public ?int $target_id = null;

    /** @see $target_type */
    public const target_type = 'target_type';
    #[Describe(['nullable' => true])]
    public ?string $target_type = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?AppPermissions $permissions = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

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

    /** @see $app_slug */
    public const app_slug = 'app_slug';
    #[Describe(['nullable' => true])]
    public ?string $app_slug = null;

    /** @see $suspended_by */
    public const suspended_by = 'suspended_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $suspended_by = null;

    /** @see $suspended_at */
    public const suspended_at = 'suspended_at';
    #[Describe(['nullable' => true])]
    public ?string $suspended_at = null;

    /** @see $contact_email */
    public const contact_email = 'contact_email';
    #[Describe(['nullable' => true])]
    public ?string $contact_email = null;
}
