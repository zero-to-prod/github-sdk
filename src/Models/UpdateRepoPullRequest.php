<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoPullRequest
{
    use DataModel;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $state */
    public const state = 'state';
    #[Describe(['nullable' => true])]
    public ?NullableMilestoneState $state = null;

    /** @see $base */
    public const base = 'base';
    #[Describe(['nullable' => true])]
    public ?string $base = null;

    /** @see $maintainer_can_modify */
    public const maintainer_can_modify = 'maintainer_can_modify';
    #[Describe(['nullable' => true])]
    public ?bool $maintainer_can_modify = null;
}
