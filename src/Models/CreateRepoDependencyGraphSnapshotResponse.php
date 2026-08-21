<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoDependencyGraphSnapshotResponse
{
    use DataModel;

    /** @see $id */
    public const id = 'id';
    #[Describe(['nullable' => true])]
    public ?int $id = null;

    /** @see $created_at */
    public const created_at = 'created_at';
    #[Describe(['nullable' => true])]
    public ?string $created_at = null;

    /** @see $result */
    public const result = 'result';
    #[Describe(['nullable' => true])]
    public ?string $result = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;
}
