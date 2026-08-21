<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class CreateRepoActionRunRerunRequest
{
    use DataModel;

    /** @see $enable_debug_logging */
    public const enable_debug_logging = 'enable_debug_logging';
    #[Describe(['nullable' => true])]
    public ?bool $enable_debug_logging = null;
}
