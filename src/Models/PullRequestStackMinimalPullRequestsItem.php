<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestStackMinimalPullRequestsItem
{
    use DataModel;

    /** @see $number */
    public const number = 'number';
    #[Describe(['nullable' => true])]
    public ?int $number = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['default' => NullableMilestoneState::unknown])]
    public NullableMilestoneState $state;

    /** @see $draft */
    public const draft = 'draft';
    #[Describe(['nullable' => true])]
    public ?bool $draft = null;

    /** @see $merged_at */
    public const merged_at = 'merged_at';
    #[Describe(['nullable' => true])]
    public ?string $merged_at = null;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?PullRequestStackMinimalPullRequestsItemHead $head = null;
}
