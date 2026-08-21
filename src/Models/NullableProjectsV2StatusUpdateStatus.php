<?php

declare(strict_types=1);

namespace Zerotoprod\GitHubSdk\Models;

/**
 * The current status.
 * @link https://docs.github.com/
 */
enum NullableProjectsV2StatusUpdateStatus: string
{
    case unknown = 'unknown';
    case INACTIVE = 'INACTIVE';
    case ON_TRACK = 'ON_TRACK';
    case AT_RISK = 'AT_RISK';
    case OFF_TRACK = 'OFF_TRACK';
    case COMPLETE = 'COMPLETE';
}
