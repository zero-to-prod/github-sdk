<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * Indicates whether a campaign is open or closed
 * @link https://docs.github.com/
 */
enum CampaignState: string
{
    case unknown = 'unknown';
    case open = 'open';
    case closed = 'closed';
}
