<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PagesSourceHash
{
    use DataModel;

    /** @see $branch */
    public const branch = 'branch';
    #[Describe(['nullable' => true])]
    public ?string $branch = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;
}
