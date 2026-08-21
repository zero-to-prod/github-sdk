<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateApplicationTokenScopedRequest
{
    use DataModel;

    /** @see $access_token */
    public const access_token = 'access_token';
    #[Describe(['nullable' => true])]
    public ?string $access_token = null;

    /** @see $target */
    public const target = 'target';
    #[Describe(['nullable' => true])]
    public ?string $target = null;

    /** @see $target_id */
    public const target_id = 'target_id';
    #[Describe(['nullable' => true])]
    public ?int $target_id = null;

    /** @see $repositories */
    public const repositories = 'repositories';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $repositories;

    /** @see $repository_ids */
    public const repository_ids = 'repository_ids';
    /** @var array<int, int> */
    #[Describe(['default' => []])]
    public array $repository_ids;

    /** @see $permissions */
    public const permissions = 'permissions';
    #[Describe(['nullable' => true])]
    public ?AppPermissions $permissions = null;
}
