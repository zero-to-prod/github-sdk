<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class BranchRestrictionPolicyAppsItemOwner
{
    use DataModel;

    /** @see $login */
    public const login = 'login';
    #[Describe(['nullable' => true])]
    public ?string $login = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $repos_url */
    public const repos_url = 'repos_url';
    #[Describe(['nullable' => true])]
    public ?string $repos_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

    /** @see $hooks_url */
    public const hooks_url = 'hooks_url';
    #[Describe(['nullable' => true])]
    public ?string $hooks_url = null;

    /** @see $issues_url */
    public const issues_url = 'issues_url';
    #[Describe(['nullable' => true])]
    public ?string $issues_url = null;

    /** @see $members_url */
    public const members_url = 'members_url';
    #[Describe(['nullable' => true])]
    public ?string $members_url = null;

    /** @see $public_members_url */
    public const public_members_url = 'public_members_url';
    #[Describe(['nullable' => true])]
    public ?string $public_members_url = null;

    /** @see $avatar_url */
    public const avatar_url = 'avatar_url';
    #[Describe(['nullable' => true])]
    public ?string $avatar_url = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $gravatar_id */
    public const gravatar_id = 'gravatar_id';
    #[Describe(['nullable' => true])]
    public ?string $gravatar_id = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $followers_url */
    public const followers_url = 'followers_url';
    #[Describe(['nullable' => true])]
    public ?string $followers_url = null;

    /** @see $following_url */
    public const following_url = 'following_url';
    #[Describe(['nullable' => true])]
    public ?string $following_url = null;

    /** @see $gists_url */
    public const gists_url = 'gists_url';
    #[Describe(['nullable' => true])]
    public ?string $gists_url = null;

    /** @see $starred_url */
    public const starred_url = 'starred_url';
    #[Describe(['nullable' => true])]
    public ?string $starred_url = null;

    /** @see $subscriptions_url */
    public const subscriptions_url = 'subscriptions_url';
    #[Describe(['nullable' => true])]
    public ?string $subscriptions_url = null;

    /** @see $organizations_url */
    public const organizations_url = 'organizations_url';
    #[Describe(['nullable' => true])]
    public ?string $organizations_url = null;

    /** @see $received_events_url */
    public const received_events_url = 'received_events_url';
    #[Describe(['nullable' => true])]
    public ?string $received_events_url = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $site_admin */
    public const site_admin = 'site_admin';
    #[Describe(['nullable' => true])]
    public ?bool $site_admin = null;

    /** @see $user_view_type */
    public const user_view_type = 'user_view_type';
    #[Describe(['nullable' => true])]
    public ?string $user_view_type = null;
}
