<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

use Zerotoprod\DataModel\Describe;
use Zerotoprod\GitHubSdk\Internal\DataModel;

/**
 * @link https://docs.github.com/
 */
class ListOrgCopilotBillingSeatsResponse
{
    use DataModel;

    /** @see $total_seats */
    public const total_seats = 'total_seats';
    #[Describe(['nullable' => true])]
    public ?int $total_seats = null;

    /** @see $seats */
    public const seats = 'seats';
    /** @var array<int, CopilotSeatDetails> */
    #[Describe([
        'cast' => [self::class, 'mapOf'],
        'type' => CopilotSeatDetails::class,
        'default' => [],
    ])]
    public array $seats;
}
