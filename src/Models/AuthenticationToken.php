<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Authentication Token
 * @link https://docs.github.com/
 */
class AuthenticationToken
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
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $permissions;

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

    /** @see $repository_selection */
    public const repository_selection = 'repository_selection';
    #[Describe(['nullable' => true])]
    public ?InstallationRepositorySelection $repository_selection = null;
}
