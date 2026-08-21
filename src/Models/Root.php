<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class Root
{
    use DataModel;

    /** @see $current_user_url */
    public const current_user_url = 'current_user_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_url = null;

    /** @see $current_user_authorizations_html_url */
    public const current_user_authorizations_html_url = 'current_user_authorizations_html_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_authorizations_html_url = null;

    /** @see $authorizations_url */
    public const authorizations_url = 'authorizations_url';
    #[Describe(['nullable' => true])]
    public ?string $authorizations_url = null;

    /** @see $code_search_url */
    public const code_search_url = 'code_search_url';
    #[Describe(['nullable' => true])]
    public ?string $code_search_url = null;

    /** @see $commit_search_url */
    public const commit_search_url = 'commit_search_url';
    #[Describe(['nullable' => true])]
    public ?string $commit_search_url = null;

    /** @see $emails_url */
    public const emails_url = 'emails_url';
    #[Describe(['nullable' => true])]
    public ?string $emails_url = null;

    /** @see $emojis_url */
    public const emojis_url = 'emojis_url';
    #[Describe(['nullable' => true])]
    public ?string $emojis_url = null;

    /** @see $events_url */
    public const events_url = 'events_url';
    #[Describe(['nullable' => true])]
    public ?string $events_url = null;

    /** @see $feeds_url */
    public const feeds_url = 'feeds_url';
    #[Describe(['nullable' => true])]
    public ?string $feeds_url = null;

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

    /** @see $hub_url */
    public const hub_url = 'hub_url';
    #[Describe(['nullable' => true])]
    public ?string $hub_url = null;

    /** @see $issue_search_url */
    public const issue_search_url = 'issue_search_url';
    #[Describe(['nullable' => true])]
    public ?string $issue_search_url = null;

    /** @see $issues_url */
    public const issues_url = 'issues_url';
    #[Describe(['nullable' => true])]
    public ?string $issues_url = null;

    /** @see $keys_url */
    public const keys_url = 'keys_url';
    #[Describe(['nullable' => true])]
    public ?string $keys_url = null;

    /** @see $label_search_url */
    public const label_search_url = 'label_search_url';
    #[Describe(['nullable' => true])]
    public ?string $label_search_url = null;

    /** @see $notifications_url */
    public const notifications_url = 'notifications_url';
    #[Describe(['nullable' => true])]
    public ?string $notifications_url = null;

    /** @see $organization_url */
    public const organization_url = 'organization_url';
    #[Describe(['nullable' => true])]
    public ?string $organization_url = null;

    /** @see $organization_repositories_url */
    public const organization_repositories_url = 'organization_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $organization_repositories_url = null;

    /** @see $organization_teams_url */
    public const organization_teams_url = 'organization_teams_url';
    #[Describe(['nullable' => true])]
    public ?string $organization_teams_url = null;

    /** @see $public_gists_url */
    public const public_gists_url = 'public_gists_url';
    #[Describe(['nullable' => true])]
    public ?string $public_gists_url = null;

    /** @see $rate_limit_url */
    public const rate_limit_url = 'rate_limit_url';
    #[Describe(['nullable' => true])]
    public ?string $rate_limit_url = null;

    /** @see $repository_url */
    public const repository_url = 'repository_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_url = null;

    /** @see $repository_search_url */
    public const repository_search_url = 'repository_search_url';
    #[Describe(['nullable' => true])]
    public ?string $repository_search_url = null;

    /** @see $current_user_repositories_url */
    public const current_user_repositories_url = 'current_user_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $current_user_repositories_url = null;

    /** @see $starred_url */
    public const starred_url = 'starred_url';
    #[Describe(['nullable' => true])]
    public ?string $starred_url = null;

    /** @see $starred_gists_url */
    public const starred_gists_url = 'starred_gists_url';
    #[Describe(['nullable' => true])]
    public ?string $starred_gists_url = null;

    /** @see $topic_search_url */
    public const topic_search_url = 'topic_search_url';
    #[Describe(['nullable' => true])]
    public ?string $topic_search_url = null;

    /** @see $user_url */
    public const user_url = 'user_url';
    #[Describe(['nullable' => true])]
    public ?string $user_url = null;

    /** @see $user_organizations_url */
    public const user_organizations_url = 'user_organizations_url';
    #[Describe(['nullable' => true])]
    public ?string $user_organizations_url = null;

    /** @see $user_repositories_url */
    public const user_repositories_url = 'user_repositories_url';
    #[Describe(['nullable' => true])]
    public ?string $user_repositories_url = null;

    /** @see $user_search_url */
    public const user_search_url = 'user_search_url';
    #[Describe(['nullable' => true])]
    public ?string $user_search_url = null;
}
