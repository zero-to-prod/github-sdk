<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateAppInstallationAccessTokenRequest
{
    use DataModel;

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
