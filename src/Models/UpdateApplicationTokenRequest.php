<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class UpdateApplicationTokenRequest
{
    use DataModel;

    /** @see $access_token */
    public const access_token = 'access_token';
    #[Describe(['nullable' => true])]
    public ?string $access_token = null;
}
