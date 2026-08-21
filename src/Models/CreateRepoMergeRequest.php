<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoMergeRequest
{
    use DataModel;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?string $base = null;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?string $head = null;

    /** @see $commit_message */
    public const commit_message = 'commit_message';
    #[Describe(['nullable' => true])]
    public ?string $commit_message = null;
}
