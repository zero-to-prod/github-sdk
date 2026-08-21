<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * The status of auto merging a pull request.
 * @link https://docs.github.com/
 */
class AutoMerge
{
    use DataModel;

    /** @see $enabled_by */
    public const enabled_by = 'enabled_by';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $enabled_by = null;

    /** @see $merge_method */
    public const merge_method = 'merge_method';
    #[Describe(['default' => AutoMergeMergeMethod::unknown])]
    public AutoMergeMergeMethod $merge_method;

    /** @see $commit_title */
    public const commit_title = 'commit_title';
    #[Describe(['nullable' => true])]
    public ?string $commit_title = null;

    /** @see $commit_message */
    public const commit_message = 'commit_message';
    #[Describe(['nullable' => true])]
    public ?string $commit_message = null;
}
