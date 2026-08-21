<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Pull Request Merge Async Result
 * @link https://docs.github.com/
 */
class PullRequestMergeAsyncResult
{
    use DataModel;

    /** @see $status */
    public const status = 'status';
    #[Describe(['default' => PullRequestMergeAsyncResultStatus::unknown])]
    public PullRequestMergeAsyncResultStatus $status;

    /** @see $details */
    public const details = 'details';
    /** @var array<string, mixed> */
    #[Describe(['default' => []])]
    public array $details;
}
