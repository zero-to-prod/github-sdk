<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * Interaction limit settings.
 * @link https://docs.github.com/
 */
class InteractionLimitResponse
{
    use DataModel;

    /** @see $limit */
    public const limit = 'limit';
    #[Describe(['default' => InteractionGroup::unknown])]
    public InteractionGroup $limit;

    /** @see $origin */
    public const origin = 'origin';
    #[Describe(['nullable' => true])]
    public ?string $origin = null;

    /** @see $expires_at */
    public const expires_at = 'expires_at';
    #[Describe(['nullable' => true])]
    public ?string $expires_at = null;
}
