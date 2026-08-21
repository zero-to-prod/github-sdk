<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class PushEvent
{
    use DataModel;

    /** @see $repository_id */
    public const repository_id = 'repository_id';
    #[Describe(['nullable' => true])]
    public ?int $repository_id = null;

    /** @see $push_id */
    public const push_id = 'push_id';
    #[Describe(['nullable' => true])]
    public ?int $push_id = null;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $head */
    public const head = 'head';
    #[Describe(['nullable' => true])]
    public ?string $head = null;

    /** @see $before */
    public const before = 'before';
    #[Describe(['nullable' => true])]
    public ?string $before = null;
}
