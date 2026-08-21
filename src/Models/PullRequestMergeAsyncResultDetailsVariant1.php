<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * When an asynchronous merge request was created or already existed
 * @link https://docs.github.com/
 */
class PullRequestMergeAsyncResultDetailsVariant1
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $uuid */
    public const uuid = 'uuid';
    #[Describe(['nullable' => true])]
    public ?string $uuid = null;

    /** @see $merge_method */
    public const merge_method = 'merge_method';
    #[Describe(['default' => PullRequestMergeAsyncResultDetailsVariant1MergeMethod::unknown])]
    public PullRequestMergeAsyncResultDetailsVariant1MergeMethod $merge_method;

    /** @see $merge_action */
    public const merge_action = 'merge_action';
    #[Describe(['default' => PullRequestMergeAsyncResultDetailsVariant1MergeAction::unknown])]
    public PullRequestMergeAsyncResultDetailsVariant1MergeAction $merge_action;

    /** @see $expected_head_sha */
    public const expected_head_sha = 'expected_head_sha';
    #[Describe(['nullable' => true])]
    public ?string $expected_head_sha = null;
}
