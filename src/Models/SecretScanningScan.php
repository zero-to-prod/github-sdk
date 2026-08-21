<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Information on a single scan performed by secret scanning on the
 * repository
 * @link https://docs.github.com/
 */
class SecretScanningScan
{
    use DataModel;

    /** @see $type */
    public const type = 'type';
    #[Describe(['nullable' => true])]
    public ?string $type = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $completed_at */
    public const completed_at = 'completed_at';
    #[Describe(['nullable' => true])]
    public ?string $completed_at = null;

    /** @see $started_at */
    public const started_at = 'started_at';
    #[Describe(['nullable' => true])]
    public ?string $started_at = null;
}
