<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * GitHub apps are a new way to extend GitHub. They can be installed directly
 * on organizations and user accounts and granted access to specific
 * repositories. They come with granular permissions and built-in webhooks.
 * GitHub apps are first class actors within GitHub.
 * @link https://docs.github.com/
 */
class Integration
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $slug */
    public const slug = 'slug';
    #[Describe(['nullable' => true])]
    public ?string $slug = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $client_id */
    public const client_id = 'client_id';
    #[Describe(['nullable' => true])]
    public ?string $client_id = null;

    /** @see $owner */
    public const owner = 'owner';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $owner;

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $external_url */
    public const external_url = 'external_url';
    #[Describe(['nullable' => true])]
    public ?string $external_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?IntegrationPermissions $permissions = null;

    /** @see $events */
    public const events = 'events';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $events;

    /** @see $installations_count */
    public const installations_count = 'installations_count';
    #[Describe(['nullable' => true])]
    public ?int $installations_count = null;
}
