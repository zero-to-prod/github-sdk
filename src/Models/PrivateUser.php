<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Private User
 * @link https://docs.github.com/
 */
class PrivateUser
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

    /** @see $user_view_type */
    public const user_view_type = 'user_view_type';
    #[Describe(['nullable' => true])]
    public ?string $user_view_type = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $avatar_url */
    public const avatar_url = 'avatar_url';
    #[Describe(['nullable' => true])]
    public ?string $avatar_url = null;

    /** @see $gravatar_id */
    public const gravatar_id = 'gravatar_id';
    #[Describe(['nullable' => true])]
    public ?string $gravatar_id = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

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

    /** @see $repos_url */
    public const repos_url = 'repos_url';
    #[Describe(['nullable' => true])]
    public ?string $repos_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

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

    /** @see $name */
    public const name = 'name';
    #[Describe(['nullable' => true])]
    public ?string $name = null;

    /** @see $company */
    public const company = 'company';
    #[Describe(['nullable' => true])]
    public ?string $company = null;

    /** @see $blog */
    public const blog = 'blog';
    #[Describe(['nullable' => true])]
    public ?string $blog = null;

    /** @see $location */
    public const location = 'location';
    #[Describe(['nullable' => true])]
    public ?string $location = null;

    /** @see $email */
    public const email = 'email';
    #[Describe(['nullable' => true])]
    public ?string $email = null;

    /** @see $notification_email */
    public const notification_email = 'notification_email';
    #[Describe(['nullable' => true])]
    public ?string $notification_email = null;

    /** @see $hireable */
    public const hireable = 'hireable';
    #[Describe(['nullable' => true])]
    public ?bool $hireable = null;

    /** @see $bio */
    public const bio = 'bio';
    #[Describe(['nullable' => true])]
    public ?string $bio = null;

    /** @see $twitter_username */
    public const twitter_username = 'twitter_username';
    #[Describe(['nullable' => true])]
    public ?string $twitter_username = null;

    /** @see $public_repos */
    public const public_repos = 'public_repos';
    #[Describe(['nullable' => true])]
    public ?int $public_repos = null;

    /** @see $public_gists */
    public const public_gists = 'public_gists';
    #[Describe(['nullable' => true])]
    public ?int $public_gists = null;

    /** @see $followers */
    public const followers = 'followers';
    #[Describe(['nullable' => true])]
    public ?int $followers = null;

    /** @see $following */
    public const following = 'following';
    #[Describe(['nullable' => true])]
    public ?int $following = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $private_gists */
    public const private_gists = 'private_gists';
    #[Describe(['nullable' => true])]
    public ?int $private_gists = null;

    /** @see $total_private_repos */
    public const total_private_repos = 'total_private_repos';
    #[Describe(['nullable' => true])]
    public ?int $total_private_repos = null;

    /** @see $owned_private_repos */
    public const owned_private_repos = 'owned_private_repos';
    #[Describe(['nullable' => true])]
    public ?int $owned_private_repos = null;

    /** @see $disk_usage */
    public const disk_usage = 'disk_usage';
    #[Describe(['nullable' => true])]
    public ?int $disk_usage = null;

    /** @see $collaborators */
    public const collaborators = 'collaborators';
    #[Describe(['nullable' => true])]
    public ?int $collaborators = null;

    /** @see $two_factor_authentication */
    public const two_factor_authentication = 'two_factor_authentication';
    #[Describe(['nullable' => true])]
    public ?bool $two_factor_authentication = null;

    /** @see $plan */
    public const plan = 'plan';
    #[Describe(['nullable' => true])]
    public ?PrivateUserPlan $plan = null;

    /** @see $business_plus */
    public const business_plus = 'business_plus';
    #[Describe(['nullable' => true])]
    public ?bool $business_plus = null;

    /** @see $ldap_dn */
    public const ldap_dn = 'ldap_dn';
    #[Describe(['nullable' => true])]
    public ?string $ldap_dn = null;
}
