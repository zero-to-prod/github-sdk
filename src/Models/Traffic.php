<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class Traffic
{
    use DataModel;

    /** @see $timestamp */
    public const timestamp = 'timestamp';
    #[Describe(['nullable' => true])]
    public ?string $timestamp = null;

    /** @see $uniques */
    public const uniques = 'uniques';
    #[Describe(['nullable' => true])]
    public ?int $uniques = null;

    /** @see $count */
    public const count = 'count';
    #[Describe(['nullable' => true])]
    public ?int $count = null;
}
