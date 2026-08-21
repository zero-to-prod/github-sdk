<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Check immutable releases
 * @link https://docs.github.com/
 */
class CheckImmutableReleases
{
    use DataModel;

    /** @see $enabled */
    public const enabled = 'enabled';
    #[Describe(['nullable' => true])]
    public ?bool $enabled = null;

    /** @see $enforced_by_owner */
    public const enforced_by_owner = 'enforced_by_owner';
    #[Describe(['nullable' => true])]
    public ?bool $enforced_by_owner = null;
}
