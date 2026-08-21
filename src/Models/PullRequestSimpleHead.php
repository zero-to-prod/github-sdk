<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PullRequestSimpleHead
{
    use DataModel;

    /** @see $label */
    public const label = 'label';
    #[Describe(['nullable' => true])]
    public ?string $label = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $repo */
    public const repo = 'repo';
    #[Describe(['nullable' => true])]
    public ?Repository $repo = null;

    /** @see $sha */
    public const sha = 'sha';
    #[Describe(['nullable' => true])]
    public ?string $sha = null;

    /** @see $user */
    public const user = 'user';
    #[Describe(['nullable' => true])]
    public ?SimpleUser $user = null;
}
