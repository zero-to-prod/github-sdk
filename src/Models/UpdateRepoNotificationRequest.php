<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateRepoNotificationRequest
{
    use DataModel;

    /** @see $last_read_at */
    public const last_read_at = 'last_read_at';
    #[Describe(['nullable' => true])]
    public ?string $last_read_at = null;
}
