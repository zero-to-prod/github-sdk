<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class DeleteEvent
{
    use DataModel;

    /** @see $ref */
    public const ref = 'ref';
    #[Describe(['nullable' => true])]
    public ?string $ref = null;

    /** @see $ref_type */
    public const ref_type = 'ref_type';
    #[Describe(['nullable' => true])]
    public ?string $ref_type = null;

    /** @see $full_ref */
    public const full_ref = 'full_ref';
    #[Describe(['nullable' => true])]
    public ?string $full_ref = null;

    /** @see $pusher_type */
    public const pusher_type = 'pusher_type';
    #[Describe(['nullable' => true])]
    public ?string $pusher_type = null;
}
