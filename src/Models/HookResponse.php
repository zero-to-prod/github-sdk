<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class HookResponse
{
    use DataModel;

    /** @see $code */
    public const code = 'code';
    #[Describe(['nullable' => true])]
    public ?int $code = null;

    /** @see $status */
    public const status = 'status';
    #[Describe(['nullable' => true])]
    public ?string $status = null;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;
}
