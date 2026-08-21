<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Feed
 * @link https://docs.github.com/
 */
class Feed
{
    use DataModel;

    /** @see $timeline_url */
    public const timeline_url = 'timeline_url';
    #[Describe(['nullable' => true])]
    public ?string $timeline_url = null;

    /** @see $user_url */
    public const user_url = 'user_url';
    #[Describe(['nullable' => true])]
    public ?string $user_url = null;

    /** @see $current_user_public_url */
    public const current_user_public_url = 'current_user_public_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_public_url = null;

    /** @see $current_user_url */
    public const current_user_url = 'current_user_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_url = null;

    /** @see $current_user_actor_url */
    public const current_user_actor_url = 'current_user_actor_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_actor_url = null;

    /** @see $current_user_organization_url */
    public const current_user_organization_url = 'current_user_organization_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_organization_url = null;

    /** @see $current_user_organization_urls */
    public const current_user_organization_urls = 'current_user_organization_urls';
    /** @var array<int, string> */
    #[Describe(['default' => []])]
    public array $current_user_organization_urls;

    /** @see $security_advisories_url */
    public const security_advisories_url = 'security_advisories_url';
    #[Describe(['nullable' => true])]
    public ?string $security_advisories_url = null;

    /** @see $repository_discussions_url */
    public const repository_discussions_url = 'repository_discussions_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_discussions_url = null;

    /** @see $repository_discussions_category_url */
    public const repository_discussions_category_url = 'repository_discussions_category_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_discussions_category_url = null;

    /** @see $links */
    public const links = '_links';
    #[Describe([
        'from' => self::links,
        'nullable' => true,
    ])]
    public ?FeedLinks $links = null;
}
