<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestStackPullRequest
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?PullRequestStackPullRequestHead $head = null;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?PullRequestStackPullRequestBase $base = null;

    /** @see $node_id */
    public const node_id = 'node_id';
    #[Describe(['nullable' => true])]
    public ?string $node_id = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => NullableMilestoneState::unknown])]
    public NullableMilestoneState $state;

    /** @see $merged_at */
    public const merged_at = 'merged_at';
    #[Describe(['nullable' => true])]
    public ?string $merged_at = null;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $html_url */
    public const html_url = 'html_url';
    #[Describe(['nullable' => true])]
    public ?string $html_url = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;
}
