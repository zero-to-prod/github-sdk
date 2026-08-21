<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Results of a successful merge upstream request
 * @link https://docs.github.com/
 */
class MergedUpstream
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;

    /** @see $merge_type */
    public const merge_type = 'merge_type';
    #[Describe(['nullable' => true])]
    public ?MergedUpstreamMergeType $merge_type = null;

    /** @see $base_branch */
    public const base_branch = 'base_branch';
    #[Describe(['nullable' => true])]
    public ?string $base_branch = null;
}
