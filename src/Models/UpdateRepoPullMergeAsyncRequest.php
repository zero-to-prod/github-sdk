<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoPullMergeAsyncRequest
{
    use DataModel;

    /** @see $commit_title */
    public const commit_title = 'commit_title';
    #[Describe(['nullable' => true])]
    public ?string $commit_title = null;

    /** @see $commit_message */
    public const commit_message = 'commit_message';
    #[Describe(['nullable' => true])]
    public ?string $commit_message = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $merge_method */
    public const merge_method = 'merge_method';
    #[Describe(['nullable' => true])]
    public ?AutoMergeMergeMethod $merge_method = null;

    /** @see $merge_action */
    public const merge_action = 'merge_action';
    #[Describe(['nullable' => true])]
    public ?UpdateRepoPullMergeAsyncRequestMergeAction $merge_action = null;
}
