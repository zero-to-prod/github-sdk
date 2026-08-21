<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Content Traffic
 * @link https://docs.github.com/
 */
class ContentTraffic
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $title */
    public const title = 'title';
    #[Describe(['nullable' => true])]
    public ?string $title = null;

    /** @see $count */
    public const count = 'count';
    #[Describe(['nullable' => true])]
    public ?int $count = null;

    /** @see $uniques */
    public const uniques = 'uniques';
    #[Describe(['nullable' => true])]
    public ?int $uniques = null;
}
