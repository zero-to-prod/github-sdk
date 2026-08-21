<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoCommitCommentRequest
{
    use DataModel;

    /** @see $body */
    public const body = 'body';
    #[Describe(['nullable' => true])]
    public ?string $body = null;

    /** @see $path */
    public const path = 'path';
    #[Describe(['nullable' => true])]
    public ?string $path = null;

    /** @see $position */
    public const position = 'position';
    #[Describe(['nullable' => true])]
    public ?int $position = null;

    /** @see $line */
    public const line = 'line';
    #[Describe(['nullable' => true])]
    public ?int $line = null;
}
