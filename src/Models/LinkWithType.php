<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Hypermedia Link with Type
 * @link https://docs.github.com/
 */
class LinkWithType
{
    use DataModel;

    /** @see $href */
    public const href = 'href';
    #[Describe(['nullable' => true])]
    public ?string $href = null;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;
}
