<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Page Build Status
 * @link https://docs.github.com/
 */
class PageBuildStatus
{
    use DataModel;

    /** @see $url */
    public const url = 'url';
    #[Describe(['nullable' => true])]
    public ?string $url = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;
}
