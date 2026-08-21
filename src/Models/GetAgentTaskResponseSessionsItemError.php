<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Error details for a failed session
 * @link https://docs.github.com/
 */
class GetAgentTaskResponseSessionsItemError
{
    use DataModel;

    /** @see $message */
    public const message = 'message';
    #[Describe(['nullable' => true])]
    public ?string $message = null;
}
