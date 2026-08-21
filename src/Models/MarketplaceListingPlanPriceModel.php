<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * @link https://docs.github.com/
 */
enum MarketplaceListingPlanPriceModel: string
{
    case unknown = 'unknown';
    case FREE = 'FREE';
    case FLAT_RATE = 'FLAT_RATE';
    case PER_UNIT = 'PER_UNIT';
}
