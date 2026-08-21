<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The geographic area for this codespace. If not specified, the value is
 * assigned by IP. This property replaces `location`, which is closing down.
 * @link https://docs.github.com/
 */
enum CreateRepoCodespaceRequestGeo: string
{
    case unknown = 'unknown';
    case EuropeWest = 'EuropeWest';
    case SoutheastAsia = 'SoutheastAsia';
    case UsEast = 'UsEast';
    case UsWest = 'UsWest';
}
