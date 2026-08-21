<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information about repositories that Dependabot is able to access in an
 * organization
 * @link https://docs.github.com/
 */
class DependabotRepositoryAccessDetails
{
    use DataModel;

    /** @see $default_level */
    public const default_level = 'default_level';
    #[Describe(['nullable' => true])]
    public ?DependabotRepositoryAccessDetailsDefaultLevel $default_level = null;

    /** @see $accessible_repositories */
    public const accessible_repositories = 'accessible_repositories';
    /** @var array<int, SimpleRepository> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => SimpleRepository::class,
        'default' => [],
    ])]
    public array $accessible_repositories;
}
