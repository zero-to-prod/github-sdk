<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class FeedLinks
{
    use DataModel;

    /** @see $timeline */
    public const timeline = 'timeline';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $timeline = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $user = null;

    /** @see $security_advisories */
    public const security_advisories = 'security_advisories';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $security_advisories = null;

    /** @see $current_user */
    public const current_user = 'current_user';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $current_user = null;

    /** @see $current_user_public */
    public const current_user_public = 'current_user_public';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $current_user_public = null;

    /** @see $current_user_actor */
    public const current_user_actor = 'current_user_actor';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $current_user_actor = null;

    /** @see $current_user_organization */
    public const current_user_organization = 'current_user_organization';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $current_user_organization = null;

    /** @see $current_user_organizations */
    public const current_user_organizations = 'current_user_organizations';
    /** @var array<int, LinkWithType> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => LinkWithType::class,
        'default' => [],
    ])]
    public array $current_user_organizations;

    /** @see $repository_discussions */
    public const repository_discussions = 'repository_discussions';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $repository_discussions = null;

    /** @see $repository_discussions_category */
    public const repository_discussions_category = 'repository_discussions_category';
    #[Describe(['nullable' => true])]
    public ?LinkWithType $repository_discussions_category = null;
}
