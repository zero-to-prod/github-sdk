<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoPullReviewRequestCommentsItem
{
    use DataModel;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $position */
    public const position = 'position';
    #[Describe(['nullable' => true])]
    public ?int $position = null;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $line */
    public const line = 'line';
    #[Describe(['nullable' => true])]
    public ?int $line = null;

    /** @see $side */
    public const side = 'side';
    #[Describe(['nullable' => true])]
    public ?string $side = null;

    /** @see $start_line */
    public const start_line = 'start_line';
    #[Describe(['nullable' => true])]
    public ?int $start_line = null;

    /** @see $start_side */
    public const start_side = 'start_side';
    #[Describe(['nullable' => true])]
    public ?string $start_side = null;
}
