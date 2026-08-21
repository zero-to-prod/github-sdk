<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Limit interactions to a specific type of user for a specified duration
 * @link https://docs.github.com/
 */
class InteractionLimit
{
    use DataModel;

    /** @see $limit */
    public const limit = 'limit';
    #[Describe(['default' => InteractionGroup::unknown])]
    public InteractionGroup $limit;

    /** @see $expiry */
    public const expiry = 'expiry';
    #[Describe(['nullable' => true])]
    public ?InteractionExpiry $expiry = null;
}
