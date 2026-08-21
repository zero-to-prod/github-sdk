<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Gist Simple
 * @link https://docs.github.com/
 */
class GistSimple
{
    use DataModel;

    /** @see $forks */
    public const forks = 'forks';
    /** @var array<int, GistSimpleForksItem> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GistSimpleForksItem::class,
        'default' => [],
    ])]
    public array $forks;

    /** @see $history */
    public const history = 'history';
    /** @var array<int, GistHistory> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => GistHistory::class,
        'default' => [],
    ])]
    public array $history;

    /** @see $fork_of */
    public const fork_of = 'fork_of';
    #[Describe(['nullable' => true])]
    public ?GistSimpleForkOf $fork_of = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $forks_url */
    public const forks_url = 'forks_url';
    #[Describe(['nullable' => true])]
    public ?string $forks_url = null;

    /** @see $commits_url */
    public const commits_url = 'commits_url';
    #[Describe(['nullable' => true])]
    public ?string $commits_url = null;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?string $id = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $git_pull_url */
    public const git_pull_url = 'git_pull_url';
    #[Describe(['nullable' => true])]
    public ?string $git_pull_url = null;

    /** @see $git_push_url */
    public const git_push_url = 'git_push_url';
    #[Describe(['nullable' => true])]
    public ?string $git_push_url = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $files */
    public const files = 'files';
    /** @var array<string, GistSimpleFilesValue> */
    #[Describe(['default' => []])]
    public array $files;

    /** @see $public */
    public const public = 'public';
    #[Describe(['nullable' => true])]
    public ?bool $public = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $updated_at */
    public const updated_at = 'updated_at';
    #[Describe(['nullable' => true])]
    public ?string $updated_at = null;

    /** @see $description */
    public const description = 'description';
    #[Describe(['nullable' => true])]
    public ?string $description = null;

    /** @see $comments */
    public const comments = 'comments';
    #[Describe(['nullable' => true])]
    public ?int $comments = null;

    /** @see $comments_enabled */
    public const comments_enabled = 'comments_enabled';
    #[Describe(['nullable' => true])]
    public ?bool $comments_enabled = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?string $user = null;

    /** @see $comments_url */
    public const comments_url = 'comments_url';
    #[Describe(['nullable' => true])]
    public ?string $comments_url = null;

    /** @see $owner */
    public const owner = 'owner';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $owner = null;

    /** @see $truncated */
    public const truncated = 'truncated';
    #[Describe(['nullable' => true])]
    public ?bool $truncated = null;
}
